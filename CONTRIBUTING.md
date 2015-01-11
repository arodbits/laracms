# Contributing Guide

This page contains guidelines for contributing to the `LaraCMS` project. Please review these guidelines before submitting any pull requests to the project.

This contributing guide is based on the [Laravel Contribution Guide](https://github.com/laravel/framework/blob/master/CONTRIBUTING.md).

## Pull Requests

The pull request process differs for new features and bugs. 

### Features
Before sending a pull request for a new feature, you should first create an issue with [Proposal] in the title. 

The proposal should describe the new feature, as well as implementation ideas. 

The proposal will then be reviewed and either approved or denied. 

Once a proposal is approved, a pull request may be created implementing the new feature.

### Bugs

Pull requests for bugs may be sent without creating any proposal issue. 

If you believe that you know of a solution for a bug that has been filed on GitHub, please leave a comment detailing your proposed fix.

#### To contribute (After following the pulling request guidance before)

    Fork it
    Create your feature branch (git checkout -b my-new-feature)
    Make your changes
    Run the tests, adding new ones for your own code if necessary (phpunit)
    Commit your changes (git commit -am 'Added some feature')
    Push to the branch (git push origin my-new-feature)
    Create new Pull Request


## Feature Requests

If you have an idea for a new feature you would like to see added to Laravel, you may create an issue on GitHub with [Request] in the title. The feature request will then be reviewed by [@anthony2727](https://github.com/anthony2727).

## Coding Standards

The `Laracms` project follows the [PSR-4](http://www.php-fig.org/psr/psr-4/) coding standards. 

Although the current codebase isn't compliant yet, pull requests are required to adhere to these coding standards.

### Docblocks

The use of docblocks is required. New code which isn't documented with docblocks for functions will be refused.

When writing `@param` or `@return` statements it's encouraged to use the full namespace instead of the reference. This is to improve the readability to know immediatly which type of object you're dealing with.

## Testing

The current test suite is still being worked on,  but we encourage you to write tests for new code and/or features.
