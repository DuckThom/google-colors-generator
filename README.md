# Google Colors Generator
Generate a SCSS/LESS file with the main (50 to 900) colors from https://www.google.com/design/spec/style/color.html as variables.

## Installation
- Clone the repository `git clone https://github.com/DuckThom/google-colors-generator`
- Run `composer install` from the repository root folder

## Usage
```
google-colors-scss/ $ php console                                                                                                                                                                               Luna  1:03
Google Color stylesheet variable generator version 0.1

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  help            Displays help for a command
  list            Lists commands
 generate
  generate:style  Generate a style file in the given type [Default: scss]
