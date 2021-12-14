Symfony 5 DCCG
========================

# Project description
    Blog en php objet
    Project initial : Cours-PHP natif
    it's a blog 
    portfolio presentation
    contains articles on science, technology and climate

## Installation
    Please see the /DOCS/INSTALL.md file.
    Requirements
    ------------

  * PHP 7.3 or higher;
  * PDO-SQLite PHP extension enabled;
  * and the [usual Symfony application requirements][2].


    [Download Symfony][4] to install the `symfony` binary on your computer and run
    this command:

    ```bash
    $ symfony new --demo my_project
    ```

    Alternatively, you can use Composer:

    ```bash
    $ composer create-project symfony/symfony-demo my_project
    ```

    Usage
    -----

    There's no need to configure anything to run the application. If you have
    [installed Symfony][4] binary, run this command:

    ```bash
    $ cd my_project/
    $ symfony serve
    ```

    Then access the application in your browser at the given URL (<https://localhost:8000> by default).

    If you don't have the Symfony binary installed, run `php -S localhost:8000 -t public/`
    to use the built-in PHP web server or [configure a web server][3] like Nginx or
    Apache to run the application.

    Tests
    -----

    Execute this command to run tests:

    ```bash
    $ cd my_project/
    $ ./bin/phpunit
    ```

### How is the website organised
- Pages for Admin
  - he login
  - he can manage users (CRUD)
  - he can manage articles (CRUD)
- Pages for connected users (writers)
  - they login
  - they can create articles (Create, read, update, delete)
  - they can can choose a profil photo
- Pages for readers
  - they can read articles
  - they can see the list of articles from all writers
  - they can choose one writer and see his articles
  - they can use a search-bar to find matching articles
  - They should to be login to write a comment

## Further informations
  - read others informations in the /DOCS/ files.
