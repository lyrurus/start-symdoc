# Start Project
Start of a dockerized Symfony project.

## How to
| Preparation      | Usage     |
|------------------|-----------|
| git clone ...    | make poem |
| make start-build | make stan |
| make ps          | make fix  |
| make install     | make test |

## Under the hood
| #1            | #2                   | #3              |
|---------------|----------------------|-----------------|
| CI for GitLab | static code analysis | test database   |
| CI for GitHub | cs code fixer        | make-commands   |
| homepage      | controllers tests    | db schema "app" |
| api endpoint  | kernel tests         | volume init db  |
