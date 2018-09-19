# Learning How to Test in Python and Pyramid

*tl;dr: I don’t get testing, but thanks to Talk Python I’m starting to put it together.  If you’ve taken both the Python for Entrepreneurs course and the Building Data Driven Web Apps with Pyramid this might help you write tests using the Python for Entrepreneurs code.  And if you’ve taken courses at Talk Python, take advantage of the office hours!*

I don’t get testing in Python at all.  I don’t have a computer science degree and Python is a hobby for me.  I’ve learned enough Python to build two apps with Pyramid, but I didn’t write any tests. (Shame on me!) I was lucky enough to be asked to review [Brian Okken’s](http://pythontesting.net/) [Python Testing with pytest](https://pragprog.com/book/bopytest/python-testing-with-pytest) book last year, and after reading the first few chapters, it was way over my head and I had to apologetically let him know I just didn’t have the knowledge to review it.  I’ve read dozens of articles on testing, but nothing I’ve come across explains what to test, much less how to start it.

I’ve already raved about the training courses from [Talk Python](https://training.talkpython.fm) and I finally bought the Everything Bundle this summer.  So when Michael Kennedy launched his latest course, [Building data-driven web apps with Pyramid and SQLAlchemy](https://training.talkpython.fm/courses/details/building-data-driven-web-applications-in-python-with-pyramid-sqlalchemy-and-bootstrap), which includes a chapter on testing, I was pumped.  (That, and how to build a Pyramid app using classes and not the `pyramid_handlers` module, but that’s a different blog post for a different time).

I decided to jump around a bit in the training and dive into the tests portion of it.  What worked:  Things started to click.  The training and his code showed how to write some tests to test the views and routes within a web application.  I learn best by seeing the code examples and following along with the training, so this was exciting.  Learning the “3 A’s of Testing (Arrange, Act and then Assert) was big - not once in any of the articles I’ve read on the web did I come across those terms.

What didn’t work:  Using the code examples to test against my two existing Pyramid applications ([NFLPool](https://github.com/prcutler/nflpool) and [MLBPool2](https://github.com/prcutler/mlbpool2)).  The first reason is because I’m using the `pyramid_handlers` module (which is now not supported) and this latest course does not use this package.  The second reason is that one of the tests you write tests the whole web application - but as part of the Python for Entrepreneurs course, I had enabled other functionality, such as sending emails, Rollbar for errors, and a few other things.  The Building Data Driven Web Apps course mentions that you might have to pass some variables to the test to get it to work, but I didn’t have any luck. 

But! But! If you’ve purchased training courses from Mr. Kennedy, he offers office hours if you need help with the training courses.  These are not consultation sessions, your questions have to be related to the course, and he was kind enough to probably bend the rules slightly to help me get up and running tests with my existing applications.  After spending a few hours trying to write the tests over the weekend, I was lucky that office hours were this past Monday over my lunch hour.  He publishes the code examples on Github, so I don’t think there’s a problem with me sharing some of these code snippets.  (And by blogging about this, I’m hoping to help commit it to memory as well, as well as help anyone who has also taken both courses).

## Testing Registration

Let’s look at testing the `Account` methods, from the [Github repo from the course](https://github.com/talkpython/data-driven-web-apps-with-pyramid-and-sqlalchemy/tree/master/src/ch14-testing/final/pypi_testing/pypi/tests).  If you click the link, you’ll see that there are three tests:

* Test that registering an account works
* Test that an account already exists
* Test that a user didn’t submit their email address when registering

Since I was having problems, I was just trying to do one at a time, starting with the last one.  Here you’re going to test that an email address was not entered as part of creating an account:

	import unittest
	import unittest.mock
	import pyramid.testing
	
	
	class AccountControllerTests(unittest.TestCase):
	
		def test_register_validation_no_email(self):
			# Arrange
			from pypi.viewmodels.account.register_viewmodel import RegisterViewModel
			request = pyramid.testing.DummyRequest()
			request.POST = {
				'email': '',
				'password': 'a'
			}
			# noinspection PyTypeChecker
			vm = RegisterViewModel(request)
	
			# Act
			vm.validate()
	
			# Assert:
			self.assertIsNotNone(vm.error)
			self.assertTrue('email' in vm.error)

Using `unitest`, we’ll import the `RegisterViewModel`, which defines what’s needed for an account - a name, an email address, and a password.  Pyramid has some testing built into it, so you call the `pyramid.testing.DummyRequest()` and pass it a `POST` that includes a password, but no email.  You then pass that request to the `RegisterViewModel` which has a [method to validate](https://github.com/talkpython/data-driven-web-apps-with-pyramid-and-sqlalchemy/blob/master/src/ch14-testing/final/pypi_testing/pypi/viewmodels/account/register_viewmodel.py) the information is correct:

		def validate(self):
			if not self.email:
				self.error = 'You must specify an email address.'
			elif not self.name:
				self.error = 'You must specify your name.'
			elif not self.password:
				self.error = 'You must specify a password.'
			elif user_service.find_user_by_email(self.email):
				self.error = "This user already exists!"

But when I ran that test on NFLPool, I kept receiving an error:
`TypeError: __init__() takes 1 positional argument but 2 were given'`

Let’s look at what Michael showed me that does work:

	import unittest
	import unittest.mock
	import pyramid.testing
	
	
	class AccountControllerTests(unittest.TestCase):
	
		def test_register_validation_no_email(self):
			# Arrange
			from nflpool.viewmodels.register_viewmodel import RegisterViewModel
	
			data = {
				'first_name': 'Paul',
				'last_name': 'Cutler',
				'email': '',
				'password': 'Aa123456@',
				'confirm_password': 'Aa123456@'
			}
			# noinspection PyTypeChecker
			vm = RegisterViewModel()
			vm.from_dict(data)
	
			# Act
			vm.validate()
	
			# Assert:
			self.assertIsNotNone(vm.error)
			self.assertTrue('email' in vm.error)

If you’ve taken the Python for Entrepreneurs course, you need to do it slightly different.  The NFLPool app requires a couple more fields for registration, which is what you see in the `data` dictionary created in the test above.  You then pass that `data` dictionary to the view model using `vm.from_dict(data)` instead, and the run the `validate` method.

And look what you get!
	Ran 1 test in 0.566s
	
	OK
	0
	
	Process finished with exit code 0

It worked!   I still have some work to do with one of the three included tests, as I require my users to create a strong password, so I need to re-write my test to account for that, but the other two tests worked for me.

One last note for the other two tests - the Python for Entrepreneurs course uses a class in the `AccountService` and Data Driven course does not.  You need to account for this when assigning a target for the test.  

From the Data Driven course:

	`target = 'pypi.services.user_service.find_user_by_email'

For Python for Entrepreneurs it looks like this:

	`target = 'nflpool.services.account_service.AccountService.find_account_by_email'

## Testing the Pyramid App
Testing the entire Pyramid App turned out a bit trickier and I owe Michael a debt of gratitude as I would have never figured this out.  The Python for Entrepreneurs class has you include Rollbar (for error reporting) as well as setting up logging.  I did get the below test to run, but I had to comment out these things in NFLPool’s `__init__.py` which kind of defeats the purpose of testing.  (But hey, I was learning and it was good to validate I could get a test to run).

From the [Data Driven web course, to test the app it looks like](https://github.com/talkpython/data-driven-web-apps-with-pyramid-and-sqlalchemy/blob/master/src/ch14-testing/final/pypi_testing/pypi/tests/home_tests.py):

	import unittest
	import pyramid.testing
	
	
	class HomeControllerTests(unittest.TestCase):
	
		def setUp(self):
			from pypi import main
			app = main({})
			# noinspection PyPackageRequirements
			from webtest import TestApp
			self.app = TestApp(app)
	
		def test_home_page(self):
			# noinspection PyPackageRequirements
			import webtest.response
			response: webtest.response.TestResponse = self.app.get('/', status=200)
	
	self.assertTrue(b'Find, install and publish Python packages' in response.body)

But if you’ve built an app using Python for Entrepreneurs, you need to do a couple things.

First, create a `web_settings.py` file and add:

	import os
	import configparser
	
	config = configparser.ConfigParser()
	folder = os.path.dirname(__file__)
	file = os.path.abspath(os.path.join(folder, '..', '..', 'development.ini'))
	
	config.read(file)
	main = config['app:nflpool']
	rollbar = config['rollbar:test_settings']
	
	settings = {**main, **rollbar}

Make sure to change the line 
	main = config['app:nflpool']
so the app name equals your app’s name.

Open your Pyramid dunder init file and update your logging configuration with an `if / else` statement:

	def init_logging(config):
		settings = config.get_settings()
		if settings.get('logging') == 'OFF':
			log_filename = None
		else:
			log_filename = settings.get('log_filename', '')
		log_level = settings.get('log_level', 'ERROR')
	
		LogService.global_init(log_level, log_filename)
	
		log_package_versions()

And add the if / else statement.  You’ve now accounted for both Rollbar and you won’t create a log in your `tests` directory when running this test.

Lastly, you need to update your `development.ini` file to account for the Roller changes.  Comment out the `rollbar.root` below so you don’t receive notifications for errors in development and add the `[rollbar:test_settings]` block below.

	#  Rollbar settings
	
	rollbar.access_token = YOUR_TOKEN
	rollbar.environment = dev
	rollbar.branch = master
	# rollbar.root = %(here)s
	
	[rollbar:test_settings]

	rollbar_js_id = NONE
	rollbar.access_token = NONE
	rollbar.environment = dev
	rollbar.branch = master
	rollbar.root = blank

That’s it!  Hopefully I haven’t missed anything.  I’m excited to start writing tests for my two apps and I have a lot to write.  Once I get my head wrapped around these tests, the next phase will be to see if I can migrate some of them to `pytest` - but one thing at a time.  (And then finally review Mr. Okken’s book, too!)