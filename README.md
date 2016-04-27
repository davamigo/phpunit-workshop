# phpunit-workshop
## Statement
A company has a website and needs to validate the password of its users when a user is created or when an user changes his password.

There are two kinds of users: **admins** and **common** users.
Each kind of user has different rules to validate the password.
In the future there could be more kind of users (like power user, auditor, ...).

### Rules
* For **common** users:
    * The minimum length is 6 characters.
    * The maximun length is 20 characters.
    * The password has to have at least one upper case letter.
    * The password has to have at least one lower case letter.
    * The password has to have at least one number.
    * The valid characters are upper case letters, lower case letters, numbers, and some symbols.
* For **admin** users:
    * The minimum length is 10 characters.
    * The maximun length is 20 characters.
    * The password has to have at least one upper case letter.
    * The password has to have at least one lower case letter.
    * The password has to have at least one number.
    * The password has to have at least one symbol.
    * The valid characters are upper case letters, lower case letters, numbers, and some symbols.
    * There are some forbidden words that can't appear in the password.

### Notes
* The valid symbols are: `_`, `-`, `+`, `*`, `=`, `$`, `%`, `#`, `!`, `?`.
* The forbidden words are:
    * password
    * passw0rd
    * qwerty
    * dragon
    * football
    * baseball
    * monkey
    * shadow
    * superman
    * welcome
    * bye
    * login
    * fuck
    * abc
    * 1111
    * 1234
    * 69

## Branches
* **master**
    * The empty project.
* **ex_01**
    * Exercise 01: A proposal of code to solve the problem but without tests.
* **ex_01_solution**
    * The solution to exercise 01.
