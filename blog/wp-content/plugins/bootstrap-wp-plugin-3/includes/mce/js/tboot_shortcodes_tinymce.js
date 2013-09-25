(function() {	
	tinymce.create('tinymce.plugins.tbootShortcodeMce', {
		init : function(ed, url){
			tinymce.plugins.tbootShortcodeMce.theurl = url;
		},
		createControl : function(btn, e) {
			if ( btn == "tboot_shortcodes_button" ) {
				var a = this;	
				var btn = e.createSplitButton('tboot_button', {
	                title: "Insert Shortcode",
					image: tinymce.plugins.tbootShortcodeMce.theurl +"/images/shortcodes.png",
					icons: false,
	            });
	            btn.onRenderMenu.add(function (c, b) {

	            	b.add({title : 'Bootstrap Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);

					// Buttons
					c = b.addMenu({title:"Buttons"});
						a.render( c, "Button", "button" );
						a.render( c, "Button Dropdown", "buttondropdown" );
						a.render( c, "Button Dropdown - Split", "buttonsplitdropdown" );
						a.render( c, "Button Group", "buttongroup" );
						a.render( c, "Button Group Vertical", "buttongroupvertical" );

					// Columns
					c = b.addMenu({title:"Columns"});
						a.render( c, "Two Columns", "columns2" );
						a.render( c, "Three Columns", "columns3" );
						a.render( c, "Four Columns", "columns4" );				

					// Icons
					c = b.addMenu({title:"Icons"});
						a.render( c, "Icon", "icon" );
						a.render( c, "Icon Stacked", "iconstack" );
						a.render( c, "Icon Bulleted List", "iconul" );

					// Popover
					c = b.addMenu({title:"Popover"});
						a.render( c, "Popover", "popover" );
						a.render( c, "Popover Button", "buttonpop" );					

					// Progress Bars
					c = b.addMenu({title:"Progress Bars"});
						a.render( c, "Single", "progress" );
						a.render( c, "Stacked", "progressstacked" );					

					// Tooltip
					c = b.addMenu({title:"Tooltip"});
						a.render( c, "Tooltip", "tooltip" );
						a.render( c, "Tooltip Button", "tooltipbtn" );

					// Tabs and Toggles
					c = b.addMenu({title:"Tabs and Toggles"});
						//a.render( c, "Toggle", "toggle" );
						//a.render( c, "jQuery Tabs", "tabs" );
						a.render( c, "Tabs", "tabsbootstrap" );
						//a.render( c, "jQuery Accordion", "accordion" );
						a.render( c, "Accordion", "accordionbootstrap" );

					// More Components
					c = b.addMenu({title:"More Bootstrap Components"});
						a.render( c, "Alert", "alert" );
						a.render( c, "Badge", "badge" );
						a.render( c, "Carousel", "carousel" );
						a.render( c, "Jumbotron", "jumbotron" );
						a.render( c, "Label", "label" );
						a.render( c, "Modal", "modal" );
						a.render( c, "Panel", "panel" );
						a.render( c, "Table", "table" );
						a.render( c, "Well", "well" );

					// Extras
					c = b.addMenu({title:"Extras"});
						a.render( c, "Highlight", "highlight" );
						a.render( c, "Testimonial", "testimonial" );
						a.render( c, "Pricing Tables", "pricing" );
						a.render( c, "Spacing", "spacing" );
						a.render( c, "Clear Floats", "clear" );
					
				});
	            
	          return btn;
			}
			return null;               
		},
		render : function(ed, title, id) {
			ed.add({
				title: title,
				onclick: function () {

					// Selected content
					var mceSelected = tinyMCE.activeEditor.selection.getContent();
					
					// Add highlighted content inside the shortcode when possible - yay!
					if ( mceSelected ) {
						var tbootDummyContent = mceSelected;
					} else {
						var tbootDummyContent = 'Sample Content';
					}
					
					// Accordion
					if(id == "accordion") {
						tinyMCE.activeEditor.selection.setContent('[tboot_accordion]<br />[tboot_accordion_section title="Section 1"]<br />Accordion Content<br />[/tboot_accordion_section]<br />[tboot_accordion_section title="Section 2"]<br />Accordion Content<br />[/tboot_accordion_section]<br />[/tboot_accordion]');
					}

					// Accordion Bootstrap
					if(id == "accordionbootstrap") {
						tinyMCE.activeEditor.selection.setContent('[tboot_accordion_bootstrap name="UniqueName"]<br />[tboot_accordion_bootstrap_section color="primary" name="UniqueName" heading="Container One Title" number="1" open="yes"]<br />Accordion Bootstrap Content<br />[/tboot_accordion_bootstrap_section]<br />[tboot_accordion_bootstrap_section color="primary" name="UniqueName" heading="Container Two Title" number="2"]<br />Accordion Bootstrap Content<br />[/tboot_accordion_bootstrap_section]<br />[/tboot_accordion_bootstrap]');
					}
					
					// Alert
					if(id == "alert") {
						tinyMCE.activeEditor.selection.setContent('[tboot_alert color="danger"]Alert Content[/tboot_alert]');
					}

					// Badge
					if(id == "badge") {
						tinyMCE.activeEditor.selection.setContent('[tboot_badge]Label[/tboot_badge]');
					}
					
					// Button
					if(id == "button") {
						tinyMCE.activeEditor.selection.setContent('[tboot_button color="primary" size="lg" url="http://bragthemes.com/" title="Visit Site" target="blank"]Button Text[/tboot_button]');
					}

						// Button Dropdown
					if(id == "buttondropdown") {
						tinyMCE.activeEditor.selection.setContent('[tboot_button_dropdown label="Button Text" icon="info-sign" color="danger" size="lg"]<br />[tboot_dropdown_link icon="pencil" url="http://bragthemes.com/" target="blank"]Button Text[/tboot_dropdown_link]<br />[tboot_dropdown_link icon="comment" url="http://bragthemes.com" target="blank"]Dropdown Link[/tboot_dropdown_link]<br />[tboot_dropdown_link icon="cog" url="http://bragthemes.com" target="blank"]Button Text[/tboot_dropdown_link]<br />[tboot_dropdown_divider]<br />[tboot_dropdown_link url="http://bragthemes.com" target="blank"]Button Text[/tboot_dropdown_link]<br />[/tboot_button_dropdown]');
					}

						// Button Split Dropdown
					if(id == "buttonsplitdropdown") {
						tinyMCE.activeEditor.selection.setContent('[tboot_button_split_dropdown label="Button Text" color="primary" size="lg" url="http://bragthemes.com/" target="blank"]<br />[tboot_dropdown_link icon="pencil" url="http://bragthemes.com/" target="blank"]Button Text[/tboot_dropdown_link]<br />[/tboot_button_split_dropdown]');
					}

						// Button Group
					if(id == "buttongroup") {
						tinyMCE.activeEditor.selection.setContent('[tboot_button_group size="lg" ]<br />[tboot_button color="primary" url="http://bragthemes.com/" title="Visit Site" target="blank"]Button Text[/tboot_button][tboot_button color="danger" url="http://bragthemes.com" title="Visit Site" target="blank"]Button Text[/tboot_button]<br />[/tboot_button_group]');
					}

						// Button Group Vertical
					if(id == "buttongroupvertical") {
						tinyMCE.activeEditor.selection.setContent('[tboot_button_group_vertical size="xs" ]<br />[tboot_button color="primary" url="http://bragthemes.com/" title="Visit Site" target="blank"]Button Text[/tboot_button][tboot_button color="danger" url="http://bragthemes.com" title="Visit Site" target="blank"]Button Text[/tboot_button]<br />[/tboot_button_group_vertical]');
					}

					// Carousel
					if(id == "carousel") {
						tinyMCE.activeEditor.selection.setContent('[tboot_carousel name="ExampleCarousel"]<br />[tboot_carousel_image first="yes" title="Image Title" caption="Caption example text" link="http://domain.com/images/pic.jpg"]<br />[tboot_carousel_image title="Second Image Title" caption="Caption for second image" link="http://domain.com/images/pic.jpg"]<br />[tboot_carousel_image title="Third Image Title" caption="Caption for third image" link="http://domain.com/images/pic.jpg"]<br />[/tboot_carousel] ');
					}
					
					// Clear Floats
					if(id == "clear") {
						tinyMCE.activeEditor.selection.setContent('[tboot_clear_floats]');
					}

					// Columns 2
					if(id == "columns2") {
						tinyMCE.activeEditor.selection.setContent('[tboot_column_wrap]<br />[tboot_column size="6"]<br />Content in column 1<br />[/tboot_column]<br />[tboot_column size="6"]<br />Content in column 2<br />[/tboot_column][/tboot_column_wrap]');
					}
					
					// Columns 3
					if(id == "columns3") {
						tinyMCE.activeEditor.selection.setContent('[tboot_column_wrap]<br />[tboot_column size="4"]<br />Content in column 1<br />[/tboot_column]<br />[tboot_column size="4"]<br />Content in column 2<br />[/tboot_column]<br />[tboot_column size="4"]<br />Content in column 3<br />[/tboot_column]<br />[/tboot_column_wrap]');
					}

					// Columns 4
					if(id == "columns4") {
						tinyMCE.activeEditor.selection.setContent('[tboot_column_wrap]<br />[tboot_column size="3"]<br />Content in column 1<br />[/tboot_column]<br />[tboot_column size="3"]<br />Content in column 2<br />[/tboot_column]<br />[tboot_column size="3"]<br />Content in column 3<br />[/tboot_column]<br />[tboot_column size="3"]<br />Content in column 4<br />[/tboot_column]<br />[/tboot_column_wrap]');
					}

					// Jumbotron
					if(id == "jumbotron") {
						tinyMCE.activeEditor.selection.setContent('[tboot_jumbotron]Content of the Jumbotron <br />[tboot_button color="primary" size="lg" url="http://bragthemes.com/" title="Visit Site" target="blank"]Button Text[/tboot_button][/tboot_jumbotron]');
					}
					
					// Highlight
					if(id == "highlight") {
						tinyMCE.activeEditor.selection.setContent('[tboot_highlight color="yellow"]highlighted text[/tboot_highlight]');
					}

					// Icon
					if(id == "icon") {
						tinyMCE.activeEditor.selection.setContent('[tboot_icon icon="spinner" size="2x" spin="yes" border="yes" muted="yes" align="left" rotate="180" flip="vertical"][/tboot_icon]');
					}

					// Icon Stacked
					if(id == "iconstack") {
						tinyMCE.activeEditor.selection.setContent('[tboot_iconstack icon="check-empty" top="twitter"][/tboot_iconstack]');
					}

					// Icon List
					if(id == "iconul") {
						tinyMCE.activeEditor.selection.setContent('[tboot_iconlist]<br />[tboot_iconitem icon="youtube"]YouTube[/tboot_iconitem]<br />[tboot_iconitem icon="facebook"]Facebook[/tboot_iconitem]<br />[tboot_iconitem icon="twitter"]Twitter[/tboot_iconitem]<br />[/tboot_iconlist]');
					}

					// Label
					if(id == "label") {
						tinyMCE.activeEditor.selection.setContent('[tboot_label color="warning"]Label[/tboot_label]');
					}

					//Modal
					if(id == "modal") {
						tinyMCE.activeEditor.selection.setContent('[tboot_modal id="1" header="Title of Modal" color="danger" size="lg" text="Click Here"]Here is he content[/tboot_modal]');
					}

					//Panel
					if(id == "panel") {
						tinyMCE.activeEditor.selection.setContent('[tboot_panel color="primary" title="Title of Panel" footer="Panel Footer"]Here is the content of the panel[/tboot_panel]');
					}

					//Popover
					if(id == "popover") {
						tinyMCE.activeEditor.selection.setContent('[tboot_popover placement="top" popcontent="Content in Popover" title="Title in Popover"]Click this text for Popover[/tboot_popover]');
					}

					// Popover Button
					if(id == "buttonpop") {
						tinyMCE.activeEditor.selection.setContent('[tboot_button color="primary" size="lg" popplacement="top" poptitle="Title" popcontent="Content of popover"]Button Text[/tboot_button]');
					}
					
					// Pricing
					if(id == "pricing") {
						tinyMCE.activeEditor.selection.setContent('[tboot_pricing_table]<br />[tboot_pricing  size="4" plan="Basic" cost="$9.99" per="per month" button_url="#" button_text="Sign Up"  button_target="self" button_rel="nofollow"]<br /><ul><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/tboot_pricing]<br />[tboot_pricing featured="yes" size="4" plan="Best" cost="$19.99" per="per month" button_url="#" button_text="Sign Up" button_color="danger" button_target="self" button_rel="nofollow"]<br /><ul><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/tboot_pricing]<br />[tboot_pricing  size="4" plan="Great" cost="$29.99" per="per month" button_url="#" button_text="Sign Up" button_target="self" button_rel="nofollow"]<br /><ul><li>Feature One</li><li>Feature Two</li><li>Feature Three</li><li>Feature Four</li><li>Feature Five</li></ul>[/tboot_pricing]<br />[/tboot_pricing_table]');
					}

					// Progress Bar - Single
					if(id == "progress") {
						tinyMCE.activeEditor.selection.setContent('[tboot_progress_bar style="success" strip="yes" animate="yes" width="20"][/tboot_progress_bar]');
					}

					// Progress Bar - Stacked
					if(id == "progressstacked") {
						tinyMCE.activeEditor.selection.setContent('[tboot_stacked_progress_bar]<br />[tboot_single_stacked_bar style="success" width="20"][/tboot_single_stacked_bar]<br />[tboot_single_stacked_bar style="warning" width="30"][/tboot_single_stacked_bar]<br />[tboot_single_stacked_bar style="danger" width="30"][/tboot_single_stacked_bar]<br />[/tboot_stacked_progress_bar]');
					}
					
					//Spacing
					if(id == "spacing") {
						tinyMCE.activeEditor.selection.setContent('[tboot_spacing size="40px"]');
					}
					

					//Table
					if(id == "table") {
						tinyMCE.activeEditor.selection.setContent('[tboot_table strip="yes" border="yes" condense="yes" hover="yes" cols="names,values" data="name1,25,name2,409"][/tboot_table]');
					}
					
					//Tabs
					if(id == "tabs") {
						tinyMCE.activeEditor.selection.setContent('[tboot_tabgroup]<br />[tboot_tab title="First Tab"]<br />First tab content<br />[/tboot_tab]<br />[tboot_tab title="Second Tab"]<br />Second Tab Content.<br />[/tboot_tab]<br />[/tboot_tabgroup]');
					}

					//Tabs Bootstrap
					if(id == "tabsbootstrap") {
						tinyMCE.activeEditor.selection.setContent('[tboot_tab_bootstrap]<br />[tboot_tab_titlesection type="tabs"]<br />[tboot_tab_tabtitle active="yes" number="1"]Tab 1[/tboot_tab_tabtitle]<br />[tboot_tab_tabtitle number="2"]Tab 2[/tboot_tab_tabtitle]<br />[/tboot_tab_titlesection]<br />[tboot_tab_contentsection]<br />[tboot_tab_tabcontent active="yes" number="1"]Tab 1 Content[/tboot_tab_tabcontent]<br />[tboot_tab_tabcontent number="2"]Tab 2 Content[/tboot_tab_tabcontent]<br />[/tboot_tab_contentsection]<br />[/tboot_tab_bootstrap]');
					}
					
					//Testimonial
					if(id == "testimonial") {
						tinyMCE.activeEditor.selection.setContent('[tboot_testimonial by="BragThemes"]Your testimonial[/tboot_testimonial]');
					}
					
					//Toggle
					if(id == "toggle") {
						tinyMCE.activeEditor.selection.setContent('[tboot_toggle title="This Is Your Toggle Title"]Your Toggle Content[/tboot_toggle]');
					}

					//Tooltip
					if(id == "tooltip") {
						tinyMCE.activeEditor.selection.setContent('[tboot_tooltip text="Text in tooltip" placement="top"]Link for tooltip[/tboot_tooltip]');
					}

					//Tooltip
					if(id == "tooltipbtn") {
						tinyMCE.activeEditor.selection.setContent('[tboot_tooltip text="Text in tooltip" placement="top" color="primary" size="lg"]Link for tooltip[/tboot_tooltip]');
					}

					// Well
					if(id == "well") {
						tinyMCE.activeEditor.selection.setContent('[tboot_well width="50%"]Your Well Content[/tboot_well]');
					}
					
					
					return false;
				}
			})
		}
	
	});
	tinymce.PluginManager.add("tboot_shortcodes", tinymce.plugins.tbootShortcodeMce);
})();  