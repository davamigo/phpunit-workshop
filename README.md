# phpunit-workshop
Workshop of [PHPUnit](https://phpunit.de/) with exercises and solutions.

## Exercises
* **[Exercise 01](docs/ex01.md)**: Create the unit tests of a provided code.
* **[Exercise 02](docs/ex02.md)**: TDD approach. Make tests first and then make the code.

## Instructions
**Download the project from GitHub**
```
$ git clone https://github.com/davamigo/phpunit-workshop.git phpunit-workshop
$ cd phpunit-workshop
$ git checkout <branch>
$ composer update
```

**To run the tests**
```
$ bin/phpunit
```

## Branches
* **master**
    * [The empty project](../../tree/master).
* **ex_01**
    * [Exercise 01: A proposal of code to solve the problem but without unit tests](../../tree/ex_01).
* **ex_01_solution**
    * [The solution to exercise 01: unit tests with 100% of the coverage](../../tree/ex_01_solution).
* **ex_02**
    * [Exercise 02: The tests without the code. Red status](../../tree/ex_02).
* **ex_02_bad_solution**
    * [A bad solution to exercise 02: Green status](../../tree/ex_02_bad_solution).
* **ex_02_good_solution**
    * [The right solution to exercise 02: Green status](../../tree/ex_02_good_solution).
