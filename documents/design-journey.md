# Project 3: Design Journey

Be clear and concise in your writing. Bullets points are encouraged.

**Everything, including images, must be visible in VS Code's Markdown Preview.** If it's not visible in Markdown Preview, then we won't grade it.

# Design & Plan (Milestone 1)

## Describe your Gallery (Milestone 1)
> What will your gallery be about? 1 sentence.

My gallery will show images from the ithaca apple harvest festival, including activities and food served.

> Will you be using your existing Project 1 or Project 2 site for this project? If yes, which project?

Yes, I will be using Project 1.

> If using your existing Project 1 or Project 2, please upload sketches of your final design here.

Home:
![](2.jpg)

Vaidated form:
![](formvalid2.jpg)

Confirmation page:
![](conf.jpg)

Activities:
![](act2.jpg)

Getting Here:
![](get2.jpg)

FAQ:
![](faq2.jpg)

Contact:
![](contactdesign.jpg)


## Target Audience(s) (Milestone 1)
> Tell us about your target audience(s).

The site's target audiences are Cornell students who have not attended Ithaca Apple Harvest festival like Freshmen, Transfer students. Another target audience is local residents of Ithaca who may be interested in attending the festival with family or on a date with a significant other.
It should be an informative website, displaying information that new students are wondering about at Apple Harvest festival.

## Design Process (Milestone 1)
> Document your design process. Show us the evolution of your design from your first idea (sketch) to design you wish to implement (sketch). Show us the process you used to organize content and plan the navigation (card sorting), if applicable.
> Label all images. All labels must be visible in VS Code's Markdown Preview.
> Clearly label the final design.


Here are some initial card sortings that I used to build my site:

First card sorting:

![](first.jpg)

Second card sorting:

![](second.jpg)

Third card sorting:

![](third.jpg)

I will be incorporating the gallery before the contacts and faq page because I think it will be better for the faq and contacts page to be reached at the end for any necessary/additional questions.

Final card sorting:

![](fourth.jpg)

- Home
- Activities
- Getting Here
- Gallery
- FAQ
- Contacts

Here is my card sorting specifically for the gallery.

I first identified the content requirements:
![](cont.png)

First card sorting:
![](card1.png)

My first card sorting was logical, but I felt that it made more sense for some of the elements like "tag for image", "add tag", "delete tag" to be in a separate page with all the image details. Therefore, I created a much more reasonable and a balanced card sorting by splitting them into gallery to view all images and an image detail page.

Second card sorting:
![](card2.png)

I then decided to iterate through designs for the gallery and the image detail page.

First, I created a gallery that I thought seemed very generic with all images shown in a 3xn table.

![](gal1.jpg)

However, I realized that this did not fit all the content requirements.

Therefore, I added the content requirements under the images as shown.
![](gal2.jpg)

I did not like the arrangement for this iteration especially since the order from top to bottom went from image to tags to image and to tags.

![](gal3.jpg)

Therefore, I rearranged it so that elements that are needed for images are clumped together and the same for tags. However, this ordering seemed wrong too as the search bar was way in the bottom. I believe the search bar should be at the top.

![](gal4.jpg)
I was satisfied with this last design for the gallery page where the ordering seemed logical and the design looked nice.


Then I iterated on the designs for the image details page.

![](gal5.jpg)
First, I laid down all the content requirements that are needed for this page. I considered if the ordering looked pleasing to the eye and tried another iteration.

![](gal6.jpg)

I liked this one much better because I felt that the tags described the image more as if they were titles. Therefore, I chose to stick to this iteration.




Final design:

Home:
![](d1.jpg)

In the Home page, I added a review/questions form to make a form for the local residents target audience. I plan to put this underneath the reviews page so that I can gain more knowledge on people's experiences at the festival or get any questions they want answered in the FAQ.

Home (confirmation page):
![](d2.jpg)

I added a confirmation page to the previous form as I want to increase the interactivity of my website. I will make sure the confirmation remarks refer to the user's name by echoing it through PHP.

Activities:
![](d3.jpg)

Getting Here:
![](d4.jpg)


Gallery:
![](gal4.jpg)

Image details:
![](gal6.jpg)

As shown, the gallery has been added to this space where it will show the images of activities and location to increase interactivity with users.

FAQ:
![](d6.jpg)

The FAQ page is applicable to both Cornell students and local residents as this page will help them answer general questions on preparing for the festival. There is also a form on the bottom where users can ask more questions and I may answer them on the FAQ webpage.


Contact:
![](d7.jpg)

Finally, this contact page is applicable to both Cornell students and local residents as well because if any users need to contact me or the organizers, they can go to this webpage to find information for such.

## Design Patterns (Milestone 1)
> Explain how your site leverages existing design patterns for image galleries.
> Identify the parts of your design that leverage existing design patterns and justify their usage.
> Most of your site should leverage existing patterns. If not, fully explain why your design is a special case (you need to have a very good reason here to receive full credit).

The site's friendly, welcoming theme works very well for the image gallery that I will be implementing. The gallery page will also have the same color and font theme. I will be adding in images that are already on the website in addition to other images that show further into what the festival is like. I will be using the comic sans font to add to the friendly theme as well as colors like pink, red, brown that are already existing in the design pattern. I believe the gallery will be a good addition to the overall site and help the target audience fulfill their needs and wishes of knowing more about the festival.

## Requests (Milestone 1)
> Identify and plan each request you will support in your design.
> List each request that you will need (e.g. view image details, view gallery, etc.)
> For each request, specify the request type (GET or POST), how you will initiate the request: (form or query string param URL), and the HTTP parameters necessary for the request.


- Request: view image details
  - Type: GET
  - Params: id _or_ description (movies.id in DB)

- Request: view gallery
  - Type: GET
  - Params: id _or_ image_id (movies.id in DB)


## Database Schema Design (Milestone 1)
> Plan the structure of your database. You may use words or a picture.
> Make sure you include constraints for each field.

> Hint: You probably need `images`, `tags`, and `image_tags` tables.

> Hint: For foreign keys, use the singular name of the table + _id. For example: `image_id` and `tag_id` for the `image_tags` table.


```
tags (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE
)
images (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE
)
image_tags (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  image_id TEXT NOT NULL,
  tag_id TEXT NOT NULL,
  description TEXT
)
```

## Database Query Plan (Milestone 1)
> Plan your database queries. You may use natural language, pseudocode, or SQL.
> Using your request plan above, plan all of the queries you need.


1. All records

    ```sql
    SELECT *
    FROM courses;
    ```

2. Search records

    ```
    from one of the field chosen in the courses data table, get user input find records that match the user input
    ```

3. Insert record

    ```
    get user input, insert user input into database matching its corresponding fields
    ```

4. Update record
    ```
    UPDATE a table setting field1 = value1, ..., given conditions
    ```

5. Delete record
    ```
    Delete from table where conditions meet
    ```

## Code Planning (Milestone 1)
> Plan what top level PHP pages you'll need.

index.php, activities.php, arrival.php, contacts.php, faq.php, gallery.php


> Plan what partials you'll need.

init.php
- to initialize and get functions

Head partials (head.php)
- any necessary tags or extensions

Header partials (header.php)
- top of the page
- will include navigation bar elements
- will include heaader image, website title, subtitle at the top of the page

Footer partials (footer.php)
- at the bottom of the page
- will include footer "Selena Kang 2019"

> Plan any PHP code you'll need.

    ```php
    <?php
    // checks current php version to ensure it meets 2300's requirements
    function check_php_version()
    {
      if (version_compare(phpversion(), '7.0', '<')) {
        define('VERSION_MESSAGE', "PHP version 7.0 or higher is required for 2300. Make sure you have installed PHP 7 on your computer and have set the correct PHP path in VS Code.");
        echo VERSION_MESSAGE;
        throw VERSION_MESSAGE;
      }
    }
    check_php_version();

    function config_php_errors()
    {
      ini_set('display_startup_errors', 1);
      ini_set('display_errors', 0);
      error_reporting(E_ALL);
    }
    config_php_errors();

  // Open a connection to an SQLite database stored in filename: $db_filename.
  function open_or_init_sqlite_db($db_filename, $init_sql_filename)
  {
  if (!file_exists($init_sql_filename)) {
    throw new Exception("No such file: " . $init_sql_filename);
  }
  $init_sql = file_get_contents($init_sql_filename);
  $init_checksum = md5($init_sql);

  $init_checksum_filename = $init_sql_filename . ".checksum";

  if (!file_exists($db_filename)) {
    unlink($init_checksum_filename);
  }
  if (file_exists($db_filename) && !file_exists($init_checksum_filename)) {
    throw new Exception("No checksum for existing database. Please regenerate your database (delete .sqlite file).");
  }
  if (file_exists($init_checksum_filename)) {
    $current_checksum = file_get_contents($init_checksum_filename);

    if ($init_checksum != $current_checksum) {
      throw new Exception("Database initialization script has changed. Please regenerate your database (delete .sqlite file).");
    }
  }
  if (!file_exists($db_filename)) {
    // Create new database
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
      // initialize database using .sql script
      $result = $db->exec($init_sql);
      if ($result) {
        file_put_contents($init_checksum_filename, $init_checksum);
        return $db;
      }
    } catch (PDOException $exception) {
      // If we had an error, then the DB did not initialize properly,
      // so let's delete it!
      unlink($db_filename);
      throw $exception;
    }
  } else {
    // database was already initialized. Just open it!
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  }

  return null;
  }

// Execute a query ($sql) against a datbase ($db).
function exec_sql_query($db, $sql, $params = array())
{
  $query = $db->prepare($sql);
  if ($query and $query->execute($params)) {
    return $query;
  }
  return null;
}

  function gallery_element($image)
  { ?>
    <figure>
      <img src="images/<?php echo $image; ?>.svg" alt="<?php echo $image; ?>" />
      <figcaption><?php echo ucfirst($image); ?></figcaption>
    </figure>
  <?php

    ```




# Complete & Polished Website (Final Submission)

## Gallery Step-by-Step Instructions (Final Submission)
> Write step-by-step instructions for the graders.
> For each set of instructions, assume the grader is starting from index.php.

Viewing all images in your gallery:
1. Click on menu item "Gallery" - gallery.php
2. Look under "All Images:"

View all images for a tag:
1. Click on menu "Gallery" - gallery.php
2. type in the tag you want to search for under the title "Search Using Tag:" (can type in just a letter of the tag)

View a single image and all the tags for that image:
1. Click on menu "Gallery" - gallery.php
2. Click on a single image

How to upload a new image:
1. Click on menu "Gallery" - gallery.php
2. Scroll down to find "Upload New Image: "
3. Browse to select an image file and click upload file button

How to delete an image:
1. Click on menu "Gallery" - gallery.php
2. Click on a single image to view that you want to delete
3. Click "delete image" button under the image; Go back to "Gallery" menu to confirm that your image is also deleted

How to view all tags at once:
1. Click on menu "Gallery" - gallery.php
2. View under the title "All existing tags: "

How to add a tag to an existing image:
1. Click on menu "Gallery" - gallery.php
2. Click on an image
3. Scroll down to see "Add Tag: ", type in the tag you want to add and submit button

How to remove a tag from an existing image:
1. Click on menu "Gallery" - gallery.php
2. Click on an image
3. Click on delete button under the tag you want to delete.


## Reflection (Final Submission)
> Take this time to reflect on what you learned during this assignment. How have you improved since starting this class?

I learned alot about how SQL works, especially using it with PHP and HTML. This was a very challenging yet a good learning experience. For example, I never knew you could seed data without actually inputing the data into SQLite or SQL. I also definitely improved alot on my ability to comprehend the code that I am writing. When I started this class, I would not have understood the code that I wrote for this project. I am also able to commit to the aesthetics of the design while implementing code for a complicated dynamic page. I learned a lot about the usage of php and partials for a dynamic website and how to write a function within a page to simplify my code. I believe all of these will be helpful if I were to pursue a career in web development or even create a dynamic personal webpage. I never would have imagined in the beginning of the class to be able to create the website I created for project 3.
