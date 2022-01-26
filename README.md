## To demonstrate issue with registered routes with testbench

This repository uses docker so there's no worry of anything messing up your local environment.

First install the dependencies:

     make setup # this runs docker-compose run --rm testbench composer install

Run the tests

     make test # this runs docker-compose run --rm --service-ports --use-aliases phpunit


- Observe that the test `BasicTest::testRoute()` passes
- Observe that the test `BrowserTest::testRoute()` passes
- Observe that the test `BrowserTest::testBrowser()` fails
- Observe that the `tests/Browser/sreenshots/` directory contains an image indicating a 404 error
