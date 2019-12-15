# Crafted in Sweden
Meeting place for craft beer lovers and breweries.

## Description

Crafted in Sweden is an already existing company where people can find craft beer breweries around Sweden, read about them, find their events and their products. According to the law in Sweden costumers can’t buy alcohol directly from this webpage but they can redirect to Systembolaget’s webpage to buy these products.

In my project I will totally rebuild this existing page as the owners of it are not satisfied with the current version.

## Purpose

There is no platform at the moment to find all of the Swedish beers, breweries and tasting events. This platform would help both the customers and the breweries to find each other.

## Goal

The website must contain a log in function. There will be three kinds of accounts: administrator, customer and brewery. A customer needs to meet the age criterium to buy alcohol by law in order to register to the page.

The customers will be able to rate the products and write comments below them. The breweries will be able to create events – after they create one event they have to wait for the administrators’ acceptation.

The customers will be able to buy promotional gifts of Crafted in Sweden and breweries in a webshop. (Note: this is not a requirement from the real customer. This requirement is included because of the school project. Since it is forbidden by law to sell alcohol on this webshop, I need to include some other objects to buy.)

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

I chose WordPress to create the page, because of the easy blog handling and webshop integration features. My earlier experience with WordPress also makes development faster and easier compared to other frameworks.

For version handling I will use Git with GitHub.

I also use GitHub for backlog management.

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
