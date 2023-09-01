-- Database: 'cis480_project'
DROP DATABASE IF EXISTS cis480_project;
CREATE DATABASE cis480_project DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE cis480_project;

-- Table structure for table 'users'
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  UserNo int(11) AUTO_INCREMENT PRIMARY KEY,
  EMail varchar(50) NOT NULL,
  Password varchar(20) NOT NULL,
  FirstName varchar(50) NOT NULL,
  LastName varchar(50) NOT NULL,
  UserLevelNo int(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data for table 'users'
INSERT INTO users (EMail, Password, FirstName, LastName, 
 UserLevelNo) VALUES
('crocca@gmail.com', 'password', 'Chris', 'Rocca', 1),
('user@mail.com', 'password', 'John', 'Smith', 2);

-- Table structure for table 'user_levels'
DROP TABLE IF EXISTS user_levels;
CREATE TABLE user_levels (
  UserLevelNo int(1) AUTO_INCREMENT PRIMARY KEY,
  LevelName varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data for table 'user_levels'
INSERT INTO user_levels (LevelName) VALUES
('Administrator'),
('User');

-- Table structure for table 'about'
DROP TABLE IF EXISTS about;
CREATE TABLE about (
  AboutNo int(1) AUTO_INCREMENT PRIMARY KEY,
  AboutText varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data for table 'about'
INSERT INTO about (AboutText) VALUES
('Classic Cuisine`s was created so users can have a reliable experience for viewing common recipes, with easy to follow instructions, and fantastic results. All 
 recipes are crafted and designed with one thing in mind - Simplicity. Finding a recipe has now been made easier than ever. No longer 
  do you need to scroll to the bottom of a page to view a recipe that may not even interest you. Now, simply click the recipe of choice and
   cook the Classic Cuisine`s way!'),
('Age: 31<br> 
Education: Bachelors in Computer and Information Science. ECPI University(July2023)<br>
Additional Information: Married with 2 Children aged 12 and 10.');

-- Table structure for table 'recipe'
DROP TABLE IF EXISTS recipe;
CREATE TABLE recipe (
  RecipeNo int(1) AUTO_INCREMENT PRIMARY KEY,
  RecipeName varchar(250) NOT NULL,
  Ingredients varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data for table 'Recipe'
INSERT INTO recipe (RecipeName, Ingredients) VALUES
('Pizza', '<ul><li>Your Choice of Favorite Crust</li> <li>1 Bag of Mozzarella Cheese</li> <li>1 Jar of Pizza Sauce</li> <li>1 Package of Pepperoni</li></ul>'),
('Spaghetti', '<ul><li>1 Pound of Ground Beef</li> <li>1 Box of Spaghetti Noodles</li> <li>1 Jar of Spaghetti Sauce</li>
<li>1 tsp Garlic Powder</li> <li>1 tsp Onion Powder</li> <li>Salt & Pepper to Taste</li></ul>'),
('Garlic Bread', '<ul><li>6 Slices of Bread</li> <li>2 Tbls of Butter</li> <li>Garlic Salt</li> <li>Mozzarella</li></ul>'),
('Buffalo Wings', '<ul><li>1 Package of Chicken Wings</li> <li>Hot Sauce of choice</li> <li>Ranch or Blue Cheese (optional)</li> <li>8 cups of Oil</li></ul>');

-- Table structure for table 'instructions'
DROP TABLE IF EXISTS instructions;
CREATE TABLE instructions (
  InsNo int(1) AUTO_INCREMENT PRIMARY KEY,
  InsText varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data for table 'instructions'
INSERT INTO instructions (InsText) VALUES
( 'Preheat Oven to 425F. Add  Pizza sauce in an even layer accross the crust. Spinkle cheese over sauce then place
 desired amount of pepperonis to the top of crust. Bank for 20 to 25 Minutes. Enjoy!'),
 ('Bring 6 quarts of water to a boil. Add noodles to boiling water and cook folling package`s cook time. While wating for water to boil, 
  start browning ground beef on medium-high heat. Strain excess greece from meat. Mix the sauce and meat together with garlic powder,
   onion powder, salt and pepper. Strain noodles and top them with the meat-sauce mixture. Enjoy!'),
('Preheat Oven to 375F. Spread butter evenly acroos the slices of bread. Season the bread with garlic salt and sprinkle
 desired amount of cheese to the top of the bread. Bake for 8-10 minutes or until the cheese is melted. Enjoy!'),
 ('Add oil to 6 quart pot and heat to 350F. If wings are whole, seperate the drumette and the flat. Once oil is heated, cook untill the
 golden brown and crispy. Cooked tempurature should be 165F. Begin to preheat the oven to 400F. Strain wings and add to a bowl. Coat the wings
 in desired amount of hot sauce. Add the coated wings to a baking sheet and place in the oven. Bake for 10-15 minutes or
 until hot sauce is baked in to the wings. Serve with ranch or blue cheese. Enjoy!');


-- Add user account: User ID: cis480_project_user Password: 6TusdNdKdUoACkHm
DROP USER IF EXISTS cis480_project_user;
CREATE USER cis480_project_user@'%' IDENTIFIED VIA mysql_native_password USING '*2252BB2E0D370FDE7C672BBC576D019B2FDC9DC1';
GRANT ALL PRIVILEGES ON cis480_project.* TO cis480_project_user@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;