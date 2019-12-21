# Crafted in Sweden
Meeting place for craft beer lovers and breweries.

## Description

Crafted in Sweden is an already existing company where people can find craft beer breweries around Sweden, read about them, find their events and their products. According to the law in Sweden costumers can’t buy alcohol directly from this webpage but they can redirect to Systembolaget’s webpage to buy these products.

In my project I will totally rebuild this existing page as the owners of it are not satisfied with the current version.

This project is both my exam work for my studies in [Medieinstitutet](https://medieinstitutet.se/) as a student in e-commerce studies, and real project for [Ingrid:gopa](https://www.ingridgopa.se/), the webmarketing company I spend my internship at.

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

### Plugin or own development

When implementing a feature, it is always a decision to develop it myself, or use a plugin. Since this is a school project, it is good to code as much as I can to learn, but it's also good to learn how to make these decisions in real life to maximally satisfy the customer.

Generally I considered these questions when making a decision:

* **Development time** - in simple features it is possible to develop something faster than find and learn a plugin. But often it's faster (so cheaper) to use a plugin, which is very important in a complex project, where there are deadlines, and the customer is waiting for the product. Every case I tried to estimate the development time with coding and with plugins.
* **Error proneness** - a new functionality is always a new opportunity to introduce bugs. Whatever I develop it needs thorough testing. In case of a good plugin I get functionality which is already tested by many other people, and supported for the future. But in case of a bad plugin, I can install all of it's bugs too. It's important to check the userbase, the rating and the reviews of a plugin, as well as the update frequencies.
* **Security** - similarly to the previous point, a plugin can introduce security threaths, but can be also a safer solution than one I write myself. It also needs to be taken into consideration.
* **Performance** - very similar considerations to the previous point.

### Chosen solutions

* **[Capability Manager](https://wordpress.org/plugins/capability-manager-enhanced/)** - I use WordPress' builtin functionality for user login. Although it needs some customiyation. I chose Capability Manager to create custom user role (Brewery) and edit their capabilities.
* **[User Registration](https://wordpress.org/plugins/user-registration/)** - to create frontend registration forms. I also used this to add a checkbox for age control on user registration. There is a separate form for registration as normal user, and registration as brewery.
* **[Age Gate](https://wordpress.org/plugins/age-gate/)** - so users have to confirm a certain age before visiting the page
* **[New User Approve](https://wordpress.org/plugins/new-user-approve/)** - so administrators have to accept new users' registration.
* **Own code** - the above plugin doesn't give us the opportunity to accept/decline registrations based on user role. I looked for the code part where the new users get their initial status and modified it. Now the system queries the role of the user, and sets the status to approved if it's a subsriber (normal user).
* **[Content Control](https://wordpress.org/plugins/content-control/) and [User Menus](https://wordpress.org/plugins/user-menus/)** - these two plugins are from the same author and complement each other well. The former makes it possible to show certain content only for logged in users and only for a certain role, and the second one makes it possible to show menu items only for those users. With this we can create pages only logged in users see, for example only logged in breweries and admins can access the page for event creation.
* **Own code** - I haven't found a plugin which suits my needs when creating a page which lists all accepted breweries. (Display a user list of a certain, custom role, only with a certain status from New User Approve plugin.) I created a page template in a child theme which queries the breweries, loops through them and displays them if they have "approved" status.
* **[WP Event Manager](https://wordpress.org/plugins/wp-event-manager/)** - so users can create events. This plugin also has the feature that admins need to approve events before they get public. The plugin also contains an event listing page with filters and a dashboard.
* **[WooCommerce](https://woocommerce.com/)** - the most well-known WordPress plugin for eCommerce. This is actually a set of plugins, and even the Storefront theme, which works very well with WooCommerce, but still very customizable, so it can be fit to the customer's needs. I integrate Klarna and PayPal checkout. It makes it possible for administrators and breweries to upload products. It has a builtin functionality to create affiliate products, meaning that they cannot be bought directly on the site, indtead the "Buy" button points to a 3rd party page, which, in this case is Systembolaget.

## Security analysis