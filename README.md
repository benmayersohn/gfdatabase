# GFDatabase

## What is it?

It's a theme for [WordPress](https://wordpress.org/) that is designed for storing questions (along with hints and answers) and displaying them to visitors in random order.

## How to get started

You'll need to do a few things to get up and running:

* To use the question/answer feature you must create a page that uses the *Question Feeder* template. Use this page to write up an introduction to the feeder.

**DO NOT CREATE MORE THAN ONE *Question Feeder* PAGE.**

* You can make the question feeder your home page, or you can have a different static home page and keep your question feeder at another permalink.
* You can assign one or more topics to each question. To display all the topics in one place, make a page that uses the *Topics* template. The page will be automatically generated from the topics you have entered, though you can enter content on the page and it will be shown before the list of topics.
* If you want to show all your blog posts in one place, create a blank page using the *Post List* template. All your posts will be presented here in reverse chronological order.
* Create a navigation menu from the WordPress customizer under the *Menus* panel. Then you can customize it under the *Navigation Bar* section of the *Essentials* panel.

## Creating questions

You can create questions straight from the dashboard - it's near the top of the menu! Each question has a main field, which corresponds to the prompt; a hint, which provides some help in solving the problem; and an answer, which is...the answer.

Each question also has a topics section, where you can add one or more topics to which the question corresponds. These topics will show up under the page that uses the *Topics* template.

There is nothing much more to it than that! Questions, hints, and answers are all entered via a WYSIWYG editor. The theme has MathJax built in, so you can enter pretty typed equations as well!

## How it works

Using the theme is simple: the Question Feeder page chooses a random question from the database and displays it. By default, it chooses from all the questions, but you can also query the database by topic. Anyway, your job is to answer the question. We’ve included an example problem [here](assets/images/example-1.png).

There are three buttons below the question:

1. `Hint`: Get a hint for this problem. This will appear as a modal window that overlays the question.
1. `Answer`: View the full solution to this problem. The answer will appear below the question.
1. `Next`: Move on to the next random problem. The question will be replaced with a new one.

Clicking on `Answer` will also reveal [a button](assets/images/example-2.png) that leads to the permanent link of this problem, in case you’d like to share it with someone else or revisit it later. The question will appear the same way as it did on the home page (without the Next button, of course).

A few more things:

* `Hint` and `Answer` are optional fields, so some questions may have them and others may not. The buttons will only appear if the corresponding fields are filled out.
* You can find the answer in the source code without pressing the button, as it’s loaded on the page but simply hidden from view. But what’s the fun in that?
* Have fun!