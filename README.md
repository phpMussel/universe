### phpMussel universe repository

This repository contains experimental phpMussel code and may disappear in the future and will not have packagist 
and travis-ci support or a connected documentation. There is no guarantee that this repository remains actively maintained.

### working with the repository

This repository orchestrates directories as repositories and engages the phpmussel-vendor at the `dev/`-directory.
To work on or test code just clone the repository and `composer install` inside the `dev/`-directory.

### implementing use-cases

Each use-case must be a sub-directory of the `dev/`-directory. If a use-case does not depend on the same dependencies
as mentioned in the `dev/composer.json`, it has to define an own `composer.json`. Do not commit `vendor`-directories,
add them to the `.gitignore`-file.

### adding or modifying source

Whenever you change source make sure that you mention your work within an @author notation at the modified class and
the authors-section inside of the covering composer.json. Contributors ( at this repository ) will not be automatically
added to the composer.json by the repository maintainers.

### requesting features

If there is something amazing in your mind that should be part to phpMussel, just create an issue at this repository.
Open feature-requests will be transported to future repositories. Implemented features will be mentioned, but probably
not transported.

### reporting bugs

All bugs ( no matter if it is a security issue or not ) must be reported as an issue. We currently do not accept emails
and we believe in transparency.

### submitting reports

Any kind of report ( metrics, benchmarks, ... ) must be reported as an issue.

Thank you for understanding.

Any code of this repository is licensed under the [GNU GPL 2.0](LICENSE). The provided source code is for development only and not
intended to be used in production environments.

(c) 2016 The phpMussel Project
