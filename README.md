# Globe Bank

A project to practice on PHP and MySQL with Kevin Skoglund on LinkedIn Learning.

#### Work Area Strucutre

The project is built with public and private directory;

- public

  - It's for web document route.
  - It's the place where all the webpages that a user is able to see as well as images, style sheets, JavaScript, or any other media or assets that the website needs to functions.

- private
  - There is the content that should not be accessible by the public.
  - There's no way for a request to be sent via the web server to that private directory.
  - So, it's the place we can put libraries of PHP code, and the public won't be able to access it directly. However, the PHP files that are in the public directory can still access that code stored in the private directory because they have access via the file system. That is they can navigate the hard drive structure in order to load those files.
