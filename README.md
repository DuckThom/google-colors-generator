# Google Colors Generator [![Build Status](https://travis-ci.org/DuckThom/google-colors-generator.svg?branch=master)](https://travis-ci.org/DuckThom/google-colors-generator)
Generate a SCSS/LESS file with the main colors from https://material.google.com/style/color.html as variables.

The following color "strengths" have been added:
- 50, 100, 200, 300, 400, 500, 600, 700, 800, 900
- A100, A200, A400, A700

## Installation
- Clone the repository `git clone https://github.com/DuckThom/google-colors-generator`
- Run `composer install` from the repository root folder

## Usage
```
$ php console generate:style --help
Usage:
  generate:style [options] [--] <type>

Arguments:
  type                  Which style type should we generate?

Options:
      --cache           Do not download the source HTML file with curl
      --pretend         Do not write files
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
 Generate a style file in the given type
```

## Output

![](http://lunamoonfang.nl/s/jYsi2/full)

## Contributions

If you see something that could be improved, feel free to send a Pull Request.
Please use [PSR-2](http://www.php-fig.org/psr/psr-2/) where possible.
