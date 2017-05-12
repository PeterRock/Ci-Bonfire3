# Site Language
Site will load program language files by config and user profile

## Language Config Priority
First the system will read language field of user if loginned, 
 else the system will read config of key `language` in `application/config/config.php`


## Language Name
Please refrer to codeigniter3 language-translations.

You can look the name in `bonfire/ci3/language/`.
and more info in [Language Class](https://codeigniter.com/user_guide/libraries/language.html)

## System avaliable language config in Admin area
System will list languages by folders `application/language`.

The list of the sub-folders name is the avaliable languages name.

If the languages is more than one, users can choose their own language in profile settings page.
