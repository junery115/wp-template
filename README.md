site title : template site
username : junery115
password : notepad3
email : junery115@gmail.com

->to start we will create a theme folder inside our /wp-content/themes folder
with a name of our choosing in this case jaytemplate
-> secondly we will go inside that theme folder and create the necessary
folders eg 
=> jaytemplate -> assets (css, fonts, images, js)

-> The next folder we create under template will be classes, and it will be
for custom classes we use inorder maybe to override wordpress functionality
=> jaytemplate -> classes

-> We create inc folder: this will be for includes, that is for any other
files that we want to include
=> jaytemplate -> includes

-> template-part: allows us to split individual parts of our templates even
further 
=> jaytemplates -> template-part

-> templates: the last required
=> jaytemplates -> templates

We are doing to set up several files, but only 2 files are required for a
wordpress theme, that is the css file and the index.php file.  


-> so we will just create blank files for the time being

jaytemplate 
 => 404.php: responsible for serving 404 errors,
 => archive.php: delivering archive, e.g, will be the index of a blog post in a
hierachal format. 
=> comment.php : comment part
=> footer.php : responsible for the footer
=> functions.php: special meaning in word (where you can override and initiate
different features of your theme inside of wordpress, raw php code to override
and change the way php works.
=> header.php : responsible for the head section
=> index.php: first required file, serves as a fallback, if wordpress cannot
locate a file in the hierachy it will always fallback to the index.php
=> page.php: responsible for displaying static pages, things that aren't blog
post or blog archives, say an about page
=> readme.txt : just for things like copyright etc if someone else was to
download our template
=> search.php: template file that will display search results
=> single.php: responsible for displaying single blog post.
=> style.css: second required file, master stylesheet for the website

I'll add a screen short of the wordpress template hirarchy which you can find
on wphierarchy.com 
we added the front-page.php: This is for the front page

-> To make our wordpress theme usable we go into teh style.css page
at the top there is a comment section, wordpress will use that to display when
u go to install 

-> add the comments as in the example (style.css file)

=> when u go take a look at your theme you'll be able to see all the
information you added to your stylesheet and your screenshot shows too.
(verify for size)
=> You can activate the theme


==> we Will start work on the front-page.php

-> if you just activate the theme it will show nothing

-> Go to the example theme we are using (theme template) and copy everything
from the index page and paste that into the front-page.php
-> Once you do this, you'll see that things appear on the site


-> We will enque all our wordpress files (css etc)
=> And we will do that in our functions.php file 

we will create a function call it anything in my case
jaytemplate_register_style(); 
inside i'll use the enqueue() function and put the path to my styles
=> Then i'll use the add_action() function to let wordpress know about that
functon
=> to test it we will go to the front-page and delete the style command and
replace it with code and the code is simply wp_head()

=> We will do the same for the cdn bootstrap and the fontawesome, just replaces the $path with the
cdn path, 
=> when we do this we will see that the order of loading the style sheet might
be wrong, in that case, we will use the empty array in our style and put
bootstrap inside first, this just tells the system that our css is dependent
on the bootstrap stylesheed which will automatically load it  before our css
=> To make the version of our css dynamic we will create a $version variable
and pass it the wp_get_theme()->get('version');
=> We will replace the version in our stylesheet with the $version variable
this will make it dynamic so that everything we update our version from our
stylesheed comments its going to update here too

=> The version parameter is totally optional

-> We will do the same for the scripts as well
=> This takes 3 parameters, the name, the empty array() for dependency and
true or false, true meaning put at the bottom, false leaves it at the top and
false is the default, but we want our jquery to be loaded at the bottom.

-> Next we will create the header and the footer file

-> Next we will create the header.php and the footer.php file
=> Depends on you what you want to be in the header of the footer. But in this
case everything in the head tag we can put in the header

=> Once that is done just call the get_header() and get_footer() that works
same as includes in php.

-> We need to change things that are dynamic like our place title
=> 2 ways you hardcode the title into the head section, then you replace it
with get_title(), Another method is completely remove the title out of the
head section and you let wordpress add the title by itself and that is what we
will go with here.

=> Go to functions.php file ,  at the top add app_theme_support('title_tag),
this will add dynamic title ta g support, it does this as long as we have in
our header tags the wp_head() command
=> Put that in a function and then add an action to tell wordpress about it
using the hook 'after_setup_theme'. This allows wordpress to manage the tiles
of the page.


=> We will add a few more options inside our theme to add some extra theme
support
we will take image support for example, looking at the dimensions of our page,
if we upload images, we don't want them to be larger than our page.
=> we can do what we know as adding custom thumbnail sizes so that each time
we are inside of wordpress, if we go to media gallery and you add images,
wordpress automatically resizes those images and it uses the sizes that are
set up inside your settings, settings->media( you'll notice it has a thumbnail
size, a medium size and a large size). If you want to customize sizes beyong
this 3, though u can just change them there, you need to do that inside your
theme with the add custom sizes. For now we will leave the defaults.

-> The next thing will be letting our content be managed by wordpress.
=> We will delete all the content inside the main content. If there is header
and footer info that we need to pass into the header and footer files we will.

=> Then we will see wordpress loop which is how we can tell wp to query the db
and pull out all the content from there and actually insert it into your main
section of content.

=> We need to take all the hardcoded content that we've added into our
front-page.php and put that inside of wp. 

=> login into wp and go to our pages section and say add new

=> create a new page , give it the title home sweet home just for example and
publish it, 
=> Then write something in the body of the

=> then go into settings->reading, and make the home page to display as static
page and make it home sweet home and save the changes.

=> Then delete everything from the container section, that is the main section

-> Go into the front-page.php file and add a loop for getting post in php and that will
by default go something like

   if( have_posts()){
      while(have_posts()){
        the_post();
        the_content();
      }
   }
=> this piece of code will loop through your post in your db and give the content and display
so actually the content is coming from the content section of the page you are currently refering
to, which in this case is our home sweet home page we created.

-> We want the heading to show us the title of the current page. And that is back in the header.php
file. so we will go to where our header is found in phe header file and call the the_title() method
that will be inside the h1 tags, found in the header file

=> And in our loop there are several other things that we could pull out the author, the date and time
the tags, the post excerpt the post thumbnails and the post images. and the are all available inside the 
word press command.

-> Menu inside our sidebar for now is hard code and we need to make it dynamic
=> We need to add something inside the functions files that enables menus

-> To setup menus go into our functions.php file and add a menus function there
=> inorder to set up menus in wp you can setup what is known as menu locations e.g there is
a menu location for left, footer, mobile, we will just set up 2
=> We will create an array inside our menu function in functions.php we can call the array 
$location and inside its basically key, value,  where the key is the menu location name and
the value is like the title and a few things like that.
we can call one our primary menu and name it Desktop primary lef side bar
and one call the footer menu and we will call it the Footer Menu Items 
=> Then we will call register_nav_menus($location) function and pass it our variable
=> Then as usual we will add into the actions calling the add_action('init', 'jaytemplate_menus') and this
will hook into the initialize function which happens fairly early on in the hook process and we will 
go ahead and save. 

=> once that is active and we go back into wordpress and go into appearance(You will notice that before there was 
no option for menus) but now because that has been added into the themes we can click on the menus and we now
will have menus available to us. 
=> Inside the menus we will create our first menu and we will call that our main menu
=> As we do this we will notice that we will find the Desktop promary left sidebar and foote menu items
that we created earlier as locations we can choose for our menu
=> At this point it will be a good idea to create a few new pages so we can use them as menus.
=> You add this pages as menus and then u can drag them into submenus if you so desire
=> And then we can choose where we want the menu to appear, by just selecting the checkbox
=> This is set in wp and all but we have not yet added the code for the menu to appear
=> Back into the code editor and we will go setup what is known as our primary menu
=> And that will be done in our themes header, because the header has that entire menu, and its a bit 
tricky, because all the code is hard coded but we want to remove that hardcoded menu and replace it
with a wp function that will automatically dynamically display the menu.
=> From the code the menu is inside an unordered list 
=> We will leave the navbar part collapse alone and just change the ul part with its child elts.
=> so we will create a php tag in there and use the wp_nav_menu() command, and it takes several params
it takes an array, 
1st param 'menu' just the name of the menu so 'menu' => 'primary'
2nd container , 
3rd theme_location: and this will be 'theme_location' => 'primary' so when the user selected that location
we are saying this is the primary location 
4th items_wrap : declares a template for the unordered list and then u can check on the site what we do inside
that param.


=> Now we will see that wordpress includes all kinds of new classes, and dynamically adds classes to menu items
which you can configure though it will be somewhat tricky because u will have to add what is known as the worker class
to be able to iterate over the menu and customize everything. We will not get that advanced here but we will learn some
of the tools that we could use to customize some of this class here.

=> now when u do that it will give u id and classes, and then u can just copy your custom places and paste in the code 
=> unfortunate there is no option to effect the classes on the list items within the ul with the wp nave menu
=> Inorder to do that we have to create a big long custom worker and its a bit complex
=> So as a workaround to get the classes into the list item, we will do it back under wp admin panel

=> We will go under word process screen options in the menus page, screen options found on top right that is around where
 under ur user name and then go to where it says show advanced menu properties and check css classes there and link target
=> Once you do the above step you will see that you can provide a css class for the menu options of the links in your menu
=> we need in our example the class name of nav-item which we will copy from source code to 

=> We also notice that the anchor tags have their own classes but there is no way to actually customize the anchor tags
with css classes

=> For now teacher is unaware how to do that without a custom walker class. 
=> Another way will be to change your classes to reflect wordpresses own classes so that your css can affect the elements

-> For the icon we could copy it and take it into the dashboard and paste before the menu name

=> we checked what the nav-link class does for the anchor tag, and we will change its property in our css file

-> Logo: Configuring so that the user can go in and enter a custom logo into the theme

=> Go to our functions and add themes support for the function
 we just go inside that function and add add_theme_support('custom-logo'). 
 => allows us to use the customize action on the installed themes, and you'll find an option to 
 add a logo
 => appearance->themes->customize->site Identity
 => Once the logo is in place we can actually output it.
 => then you will go inside your code and where u want the logo to go and add the function 

           if(function_exists('the_custom_logo')){
             the_custom_logo();
           }
=> The if is to check for custom if the version of wordpress supports that function because older versions did not support
the function
=> When the logo shows, wordpress again will actually add so many classes the logo might come out of shape again
=> we will find a way to use our own classes that are used with our logo. 
Instead of just the the_custom_logo we will add more 
=> So we will manually output out image. In the img source we will just call our $logo variable and its a multidemential 
array so we will get the first element of that array.
=> So all we did was grabed the path and then used that path in our image tag. The other ways is the first
but then our customizing will not work on the logo

=> Grabing the site name from the code will be using the get_bloginfo('name') this will get the name
whatever the name of the blog is

-> We need to work on post
=> we will add a bunch of post , so that we can mockup our post page and our post archive pages
Add a paragrah, some tags, excerpts(this actually are just excerpts from the post itself)
And also add a post thumbnail
=> if we check there is no way to add a featured image to the post and we want to be able to add 
that to our theme. But our theme needs it
=> So we will go back to our functions file and go to the section for theme support and adding the last one
=> Once we add that in theme support we will find that we have option field for featured image
=> The featured image size can be customized in your functions.php file, But you can also update that in 
settings->reading->media 

=> if we view the post, we will see nothing, that is because on our template page we don't have anything
setup to view individual post, which is what we will do next

-> Individual post page
=> we will go to front-page.php and copy everything into the single.php page, its actually whats responsible
for a single post.
=> After copying and pasting it should be able to display our single post => we can then split up our single.php post into different types. Because we might have different post types we may split the single page into what are known as template parts. And that is where the templates-parts comes into play. => We will make the single.php to search for a template file that matches the post type. => So instead of just outputting the content of the post we will cut that function out and then replace it with a 
function that says get_template_part('template-parts/content');
first parameter is file path and second parameter will be the type if there is any
=> once this is done our page will no longer output a content because we don't have that content type available 
in our template-parts folder

=> we create a file in template parts called content-articles, now if you leave the path just as template-part/content
without a second parameter it will just look for that content folder, now if you add a second paramenter it looks for
a hyphenated version, so something like this content-articles, where articles is the second parameter
=> What this allows for us to do is that we can have another file such as content-gallery  if we want to have a gallery 
post, which will be good if you have different post types.

=> we can now go and customize the content of the template file content-articles.php
=> We have the content showing again, after that is done there is other metadata that we might want to pull down
but there is tags, features image, category, publish date etc.

And we are going to create a page that looks like the post page on our example theme
We are going to

in the new content-article page we will call the the_content() and it will call the content here 
and then we will bring content from the post page in our template theme and change the static attributes to dynamic ones

=> For the date we will just use the_date() and then u can check the wordpress codex and you'll find different ways
you can format the date
=> for the tags we have a function call the_tags with 3 params
1st params, before the set of tags
2nd param, what is inbetween each individual
3rd param, after the entire set of tags

=> for comments we will replace the code with comments_number() which will count our comments, there will be no comment for 0 comments
=> So we will go into our comments.php file which is our template file

=> if you cannot find a theme that you like their comment files, just find the 2020 theme copy their comment file and use.

-> For comments config

=>we will write some code to get the comment number dynamically and if there is nothing ask to leave comments
=> Then we will go into content-article  after our content and pull in our comments using the comments_template() 
which basically just pulls that comments.php page and outputs it there 

=> We can also do some checks in php to say if we are allowing comments then output the comments, if its a single page, if
its an archive page don't show comments, all kinds of logic to decide when to show or not

=> After this we will output each individual comment one by one, and that will be done in our inner comment section.
=>the comments we use wp_list_comments() provide it with an array of options we want to customize, this also includes how deep 
we want the nesting to go.

=> Then we have a place for leaving replies to comments.
=> We delete the last part to put a comment form
and we will start it with a condition, to check if the post is allowing comments if(comments_open())
=> After that we call a comment_form() and pass it an array which specifies the params of your comments
=> Once this is done u can post a comment, and then go and approve the comment, though you can set wordpress to auto-approve
comments.
=> in the sample page the comments are somewhat formated differently and thats because the default wp code that is being output
is not matching 100% to the style sheet thats found in the comment, Reason because the comment code is from wp 2020 code.

-> Post archive
=> find archive.php, and it going to be similar to single.php, so we can copy paste and remove the things that we don't need
=> so what we will change there will be the template part, instead of get_template_part('temlate-parts/content', article) it will
be  get_template_part('temlate-parts/content', 'arcive') 
=> then we will go and remove everything we don't need that includes the comment section
=> We don't need header information
=> we will save and pull an archive page, but we don't have a way to get to that in our menu and now is a good time to add that
=> One way will be to create a new custom menu item called blog and once you click on that it will take you to the archive page
=> So in our dashboard, we are going to create a custom page, we will call it blog and then publish it
=> we will go down into settings reading, have our post page be displayed on the blog page,
=> we will go to appearance and menu-> pages, grab blog link and add to menu and give it our classes

-> We will now set up the archive.php template
Because of the current settings, the archive.php will not show the blog post. 
=> The archive.php only shows things like category archives, templates archives, tags archives, custom poste archives, date based
archives.
=> Our index.php file is actually going to be the file that is used for our blog post.
=> if we go to our content-archive.php we don't want to output the entire content of the blog archive page. only want he excerpt and 
you'll change that in content-archive page by using the_excerpt() instead.

=> we will go into our archive page of our theme-template and get the archive mockup there
=> grab what we need and call appropriate functions to make it dynamic
=> for images if we use the_post_thumbnail() wordpress will fill the image with its own classes but all we need
is just a is just a path to our own images so we can use them and we get that by 
the_post_thumbnail_url(), this allows them to use our own thumbnail classes.
=> For our archive images it pulls the gigantic images and strings it but we can pass in params to the function to pull a smaller
version of the image, so we can specify the thumbnail size and those sizes are coming from the thumbnail->media
=> And this is a little gotcha good to remember whenever you are pulling in thumbnails.
=> we need to add in our pagination links
=> go  back to backend go to settings and reading change blog show at most 4 post, so you can see the pagination in effect

=> we will go into our index.php file right after our loop and add in the pagination links the_post_pagination().
=> At the very basics that should do it, but there are a few other arguments you could pass to the post pagination function
=> We need to make the title a link too

-> We will be building out our page
=> we have our post but we don't have a template for the page
=> but it will not have comments, tags, dates basically there will be nothing from the header 
=> we will go into our page.php and copy into it everything frim single.php

=> Page.php is the template file file responsible for single pages
=> Once this is done, we have our individual pages
=> pages are very similar to articles, its the blogs that hold a little extra information.

-> The last thing to do will be add a couple of things with widgets
=> For example if we wanted to make an area customizable so that the user can drag and drop their own things there, we will do 
that with widgets.
=> Same thing with the footer, if we want them to be able to customize the footer we will do that with widgets still
=> We will add several different widget areas, that the admin will be able to drag and drop content into from the wp
admin panel widget interface
=> This is done in functions.php files
=> The feature we will be looking at will be called register sidebar

=> register_sidebar() function takes 2 arrays, first styling, second array is whnere you want to affect with widgets 
=>Once this is done go back to our backend go to appearance->widgets and you will see that you have a new thing called
sidebar 1 
=> so if we put like a tag cloud in our widget area and give it a title for example
=> inside our code in the before_title and after we can use that to put our h2 tags for example

=> after this you will not see it in the sidebar because all we have done is register the sidebar, but we are not 
actually outputting the side in the sidebare yet. 
=> so we have to go into our template files and output that into our theme.
=> our sidebar is in our section we call header.
=> a good example could be that we could have all the social icons put =inside a widget so that people can go into the backend
and customize it from there
=> below the icons we will call the dynamic_sidebar('sidebar-1'), we call that an just pass in our id. Which is the id we created
in our functions.php file under our widgets function
=> its a bit guffy, but the template wasn't really built with provision for that
=> we can put it in a ul list, and steal the code thats in the list above with the links
=> so we will add the code again in the functions.php in the register_sidebar() inside before_widget and after_widget

=> so we we will do is copy all the code in the header.php file for the ul which gives the social icons
=> back in our widget area we will remove the tag cloud and just add the code for the ul in a text wile that we add instead
=> we will add one to our footer section as well we will just copy and and repaste the register_sidebar

-> We can deal with the 404 template and its the template that shows when someone goes to a broken link or something
=> We will go to our index and copy it and put in the 4o4.php template

=> we will set a h1 with Page not found message and then
=> Just adding the get_search_form() message is actually going to add our search into the 404 page

=> When we search it will take us to the search page which we have not yet set up which is what we will do now

=> The search and the archive page look almost the same so just copy the archive page into the search pagew
=> You can change the header for the search for now we just leave it like that

=> We might want to allow our visitors to search from any page so we will add one to the footer

A couple of ways you can do this 

=> We might could hard code it on the like we did on the search page
=> so we could just copy the code in search and paste it in footer and we will have a search form
=> However this can also be done with widgets
=> the widget are not quite formated because our theme didn't expect one
=

-> Extras

You could add custom post types

=>So instead of just having posts and pages you could maybe have one called car reviews.
=>you could have one call videos 
=>and you could customize them
=>There is something called custom fields which allows you to add custom fields to your posts or pages
an example of that will be going to say the adding a post say for recipes and then u want to have say
recipe ingredients that you could add things to.

=> There is also plugins that do most of the things we have been doing manually

