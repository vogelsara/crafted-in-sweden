# Crafted in Sweden
Meeting place for craft beer lovers and breweries.

TODO Executive summary

## Description

Crafted in Sweden is an already existing company where people can find craft beer breweries around Sweden, read about them, find their events and their products. According to the law in Sweden costumers can’t buy alcohol directly from this webpage but they can redirect to Systembolaget’s webpage to buy these products.

In my project I will totally rebuild this existing page as the owners of it are not satisfied with the current version.

This project is both my exam work for my studies in [Medieinstitutet](https://medieinstitutet.se/) as a student in e-commerce studies, and real project for [Ingrid:gopa](https://www.ingridgopa.se/), the webmarketing company I spend my internship at.

The project's files are stored in GitHub, under https://github.com/vogelsara/crafted-in-sweden

The page is stored under the development domain: http://www.srvgl.nhely.hu/

## Purpose

There is no platform at the moment to find all of the Swedish beers, breweries and tasting events. This platform would help both the customers and the breweries to find each other.

## Goal

The website must contain a log in function. There will be three kinds of accounts: administrator, customer and brewery. A customer needs to meet the age criterium to buy alcohol by law in order to register to the page.

The customers will be able to rate the products and write comments below them. The breweries will be able to create events – after they create one event they have to wait for the administrators’ acceptation.

The customers will be able to buy promotional gifts of Crafted in Sweden and breweries in a webshop. (Note: this is not a requirement from the real customer. A requirement from school is to have products on the page which can be actually bought. Since it is forbidden by law to sell alcohol on this webshop, I need to include some other objects to buy.)

Purchase of beers should work through Systembolaget, so products will be linked to their respective Systembolaget pages.
There will be also a blog page, a page where customers can search for the breweries with some filters, a page where the customers can search for the products.

## Target group

Every craft beer lover above 20 years old in Sweden.

Work breakdown and progress can be found under [Projects page of this GitHub project](https://github.com/vogelsara/crafted-in-sweden/projects/1).

## User stories

There are 4 types of users of the system: Administrator, Brewery, User and Visitor (not registered). The following user stories apply to them:

* As an end user who is at least 20 years old I can register to the system, so I can find breweries and their products
* As an administrator I can upload non-alcoholic products, so users can buy them directly on the page
* As a visitor I can browse and filter these products, so I can easily find what I need
* As a registered user I can buy the chosen products and directly pay for them
* As a brewery I can easily register to the system, so my potential customers can find my business and products
* As an administrator I can accept or decline breweries' registration, so only real and checked breweries are present on my site
* As an end user I can browse and filter breweries, so I can find the brewery I am looking for
* As an end user I can read more about single breweries, so that I can learn more detailes about them
* As a registered brewery I can upload my own products, so that my customers can find and buy them
* As a visitor I can browse and filter the breweries' products, so I can easily find the beer I am looking for
* As a registered user I can rate and review the products, so that every user can see each other's opinion
* As a registered user I can be easily redirected to Systembolaget's corresponding page, so that I can buy the beer I have chosen
* As a brewery I can upload events, so that my potential customers can be informed about what I organize
* As an administrator I can accept/decline the events created by breweries, so that only checked events are present on the page
* As a visitor I can browse and filter events, so that I can find what can be intersting to me
* As an administrator I can write blogposts, so users can see updated news on the site, which can be used on social media too
* As a user I can read the blogposts, so I will know the news about the topic
 
## Technical comments

I chose WordPress to create the page, because of the easy blog handling and webshop integration features. WordPress is also highly extendable with a wide variety of out-of-box solutions for many problems. My earlier experience with WordPress also makes development faster and easier compared to other frameworks.

For version handling I will use Git with GitHub.

I also use GitHub for backlog management and documentation (see this page).

I work in Scrum inspired ways of working. This means (among others) I will regularly synchronise with the customer, and refine the backlog.

## Definition of Done

If I don’t specify it otherwise, every task includes the following in order to consider it done:
* Use cases are agreed with the customer and documented
* If it includes UI, it is finalized and works on every screen size
* Changes are safely version handled, pushed to the remote repository and are transparent for the customer and school
* Changes are documented, and documentation is transparent and available
* My work with reasoning behind my decisions are logged and can be reconstructed later if needed
* All of the use cases are manually tested, and I made sure I didn’t break functionality which worked earlier
* New features are demonstrated to the customer and are accepted by them

## Work log

### Plugin or own development - reasoning

When implementing a feature, it is always a decision to develop it myself, or use a plugin. Since this is a school project, it is good to code as much as I can to learn, but it's also good to learn how to make these decisions in real life to maximally satisfy the customer.

Generally I considered these questions when making a decision:

* **Development time** - in simple features it is possible to develop something faster than find and learn a plugin. But often it's faster (so cheaper) to use a plugin, which is very important in a complex project, where there are deadlines, and the customer is waiting for the product. Every case I tried to estimate the development time with coding and with plugins.
* **Error proneness** - a new functionality is always a new opportunity to introduce bugs. Whatever I develop it needs thorough testing. In case of a good plugin I get functionality which is already tested by many other people, and supported for the future. But in case of a bad plugin, I can install all of it's bugs too. It's important to check the userbase, the rating and the reviews of a plugin, as well as the update frequencies.
* **Security** - similarly to the previous point, a plugin can introduce security threaths, but can be also a safer solution than one I write myself. It also needs to be taken into consideration.
* **Performance** - very similar considerations to the previous point.
* **Future changes** - in case of using an external plugin, I need to be prepared for future changes. This is also true for the theme itself. In order to avoid complications, any customization needs to be done carefully. Theme customization is always done in child theme, and if I customize a plugin's behaviour I either only extend it via actions/filters, or override the template file in the child theme so it won't get lost when I update the plugin. Plugin behaviour can still change when the plugin changes, but plugins are only updated manyally, so when I or another admin update a plugin in the future, I need to read the changelog carefully and test the whole page toroughly.

### Chosen solutions

Here is a short summary of the main solutions chosen in the end

* **[Age Gate](https://wordpress.org/plugins/age-gate/)** - so users have to confirm a certain age before visiting the page
* **[WP Event Manager](https://wordpress.org/plugins/wp-event-manager/)** - so users can create events. This plugin also has the feature that admins need to approve events before they get public. The plugin also contains an event listing page with filters and a dashboard.
* **[WooCommerce](https://woocommerce.com/)** - the most well-known WordPress plugin for eCommerce. This is actually a set of plugins, and even the Storefront theme, which works very well with WooCommerce, but still very customizable, so it can be fit to the customer's needs. I integrate Klarna and PayPal checkout. It makes it possible for administrators and breweries to upload products. It has a builtin functionality to create affiliate products, meaning that they cannot be bought directly on the site, indtead the "Buy" button points to a 3rd party page, which, in this case is Systembolaget.
* **[Ultimate Member](https://hu.wordpress.org/plugins/ultimate-member/)** - the most used user profile management plugin, which is well tested and secure. It gives us the possibility to fulfill a lot of our requirements. With Ultimate Member I created the new user role "Bryggare" (brewery), who is similar to an author, except they can create WooCommerce products. Ultimate Member also enables us to create frontend registration forms and editable profile pages for users. Both customers and breweries can easily register, without using the admin interface. UM provides an easy way to create a page for brewery list which is filterable. UM also gives us the opportunity to show specific menu items and content only to specific users, which enables us to let only breweries to create events. UM furthermore has login form, and password reset functionality as well.
* **Connect products to breweries - own coding** - there was a requirement that some products (beers) can be assigned to users, which is not allowed by WooCommerce by default. Also Ultimate Member doesn't have the feature to list a set of WooComerce products on the profile page. So I did the following steps:
    * **Enabled WooCommerce product authors** - WooCommerce products are posts afterall, so they have authors, but WooCommerce disabled it's use by default. With a few lines of code in functions.php I could enable it back, so administrators can choose author from a dropdown in the admin interface.
    * **Write author name on product page** - also in functions.php I needed to add a function to a WooCommerce filter so the author of the product is displayed on the product page. I also added the link so the user can go to the profile page of the brewery from their product.
    * **List brewery's products on the brewery's profile page** - I had to find the php template file for the UM profile page, and copy it to my theme's folder. With this I can overwrite it. Although WooCommerce has a lot of possibilities to list different sets of products with it's shortcodes, it doesn't provide a possibility to list products of one author. So within this template I wrote a custom query which lists "product" type of posts from the specific author. Then I used the classic WordPress loop to display them. I inspected the original WooCommerce product listings and built it up from html from scratch to make it as similar as I could, looking like original WooCommerce functionality.
* **Own template for blog - own coding** - I created my own page template for blog, because I wasn't satisfied with the defalt one of the theme
	
### Chronological work log

I used GitHub's builtin task management feature to create my backlog and track my progress. You can find it from the linked GitHub repository.

The commits of the repository also give a good insight of what I did.

Here I write a separate summary of the main tasks, since not every step can be reconstructed from the above sources. This will be grouped by weeks.

**2019 week 50** (Dec 9 - 15)

* Install Wordpress on localhost. Download WordPress, install, create database, configure it and setup XAMPP.
* Setup main menu and logo
* Install and setup WooCommerce plugin
* Install and setup Event Manager plugin, and test it with initial events
* Investigate how breweries can register and how they need to be approved by admin
* Install Capability Manager plugin so Brewery role can be created
* Create Brewery role with the correct rights
* Install User Registration plugin so breweries and users can register
* Create frontend registration forms for them and create menu items for them
* Install New User Approve plugin so every registered user must be approved by an admin (not only brewery at this point)
* Install Content Control plugin so content can be restricted to specific user roles
* Install User Menus plugin so menu items can be shown/hidden based on user roles
* Set up that only breweries can reach the event creation page via Content Control and User Menus
* Create page with own code which displays list of breweries (now accepted and pending as well)

**2019 week 51** (Dec 16 - 22)

* Investigate how to solve the issue that only brewery registrations need to be accepted by admin and not subscribers
* Implement own code solution to auto approve subscribers
* Install age gate plugin so only those can see the page who confirm their ages
* Change brewery listing page so only accepted breweries are listed
* Create child theme
* Start to write report
* Install Ultimate Member plugin

**2019 week 52** (Dec 23 - 29)

* Remove Capability Manager, User Registration, New User Approve, Content Control and User Menus plugins, since these are substituted by Ultimate Member
* Remove all unnecessary code which is done by Ultimate Member: auto approve subscribers and list breweries
* Configure Ultimate Member: recreate registration and login forms created by other plugins, configure access of content and menus, create brewery list page
* Add Google Fonts to functions.php
* Start to work on custom CSS
* Set up brewery profile pages
* Set up secondary menu (log in / log out, my pages, registration) and add style to it
* Remove search bar put there by WooCommerce via hiding it with CSS
* Set up submenu (add event + event dashboard, only visible by breweries and admins)
* Cosmetic changes, like add logo in the header and refine CSS
* Create content (upload breweries and beers)

**2020 week 1** (Dec 30 - Jan 5)

* Investigate problems with the domain/storage provider
* Find other provider and register
* Upload WP site to live server and move database
* Investigate problems with the database access and solve them
* Set up FTP synchronization
* A lot of changes in CSS (menu look, button settings, page title removal, mobile view, and a lot of others)
* Investigate how to enable admin to set author of WooCommerce products and implement solution in functions.php (this includes changing all breweries to Author, making old "Brewery" custom role unneeded)
* Create mobile view CSS
* Investigate and solve problem caused by CSS changes

**2020 week 2** (Jan 6 - 12)

* Add brewery names (author) to product pages
* Add custom solution to display the specific brewery's product on their profile page. Investigate and solve a lot of minor problems
* CSS cosmetic changes

**2020 week 3** (Jan 13 - 19)

* Investigate possibilities for checkout. Klarna is not possible, since it needs real company data. PayPal can be solved.
* Create business PayPal account
* Setup checkout

**2020 week 4** (Jan 20 - 26)

* Create new brewery role, because authors cannot create WooCommerce products and setup rights
* Setup that only registered and logged in customers can rate and comment products
* Configure long and html based desciptions to users instead of only 40 words
* Create new blog page php template
* Write report
		
## System requirements and installation

This is a WordPress site, so it needs a system, which can run WordPress. Since those requirements can change over time, here is the link for them: https://wordpress.org/about/requirements/

At the time this page was created, the test system was running PHP version 7.2 and MySQL 5.6. These were also the recommended at the time for WordPress, besides HTTPS support. None of the installed plugins needed higher PHP version.

In case you are administrator and you update or install a plugin, always check the requirements against your system.

The system doesn't need installation, since it is a standalone system, which can be either used or moved to a new server. Instructions to move the system is very similar to moving it from local server to live server. There are a lot of good desctriptions on how to do that, I recommend [this one](https://www.wpbeginner.com/wp-tutorials/how-to-move-wordpress-from-local-server-to-live-site/).


## Security analysis

WordPress is the market leader content management system, so it is a very common target of threats. This site is not only the site of Crafted in Sweden, but contains information of partner breweries. A complex site also means a big surface for attacks, so security aspects need to be considered.

One basic advice is to always update WordPress itself and it's plugins as the new versions often contain security updates, and to not install unnecessary and not trustable third party plugins.

Another basic advices is to always use HTTPS, chose reliable hosting provider, do frequent backups and use string passwords.

We can also use plugins, which enable 2 factor authentication, and report security threats.

Ultimate Member has builtin ways to prevent script users from registration (honeypot fields and optional captha).

JetPack plugin can also help with the security, and can also check other plugins. [Here](https://jetpack.com/features/security/library/ultimate-member-plugin/) they checked Ultimate Member, which they rated as Good, but only the current (at the time) version, as they found vulnerabilities in older versions. It is important to use the latest one.

Generally the advices for WordPress and plugins (e.g. WooComerce) are the same.

There are a lot of other steps an administrator can do to improve security, and [this blogpost](https://www.wpbeginner.com/wordpress-security/) summarizes them very well.
