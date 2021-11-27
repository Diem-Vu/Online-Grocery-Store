

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "groceryStore";

// Checking connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql code to create table
$sql = "CREATE TABLE Customer (
        userName CHAR(30) PRIMARY KEY NOT NULL,
        Password VARCHAR(30) NOT NULL
        )";
if (mysqli_query($conn, $sql)) {
    echo "Table Customer created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
// sql code to create table Category
$sql = "CREATE TABLE Category (
        ID_Category CHAR(5)  PRIMARY KEY,
        Name VARCHAR(30) NOT NULL,
        Category_Address VARCHAR(150) NOT NULL
        )";
if (mysqli_query($conn, $sql)) {
  echo "Table Category created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
// sql code to create table ProductItems
$sql = "CREATE TABLE ProductItems (
        id CHAR(5) PRIMARY KEY NOT NULL,
        ID_Category CHAR(5),
        FOREIGN KEY (ID_Category) REFERENCES  Category (ID_Category),
        name  LONGTEXT NOT NULL,
        price  DOUBLE (5,2),
        weight DOUBLE (5,2),
        photo VARCHAR(150) NOT NULL,
        Item_Address VARCHAR(80) NOT NULL
        )";

/*// sql code to create table Snacks
$sql = "CREATE TABLE Snacks (
        id CHAR(5) PRIMARY KEY NOT NULL,
        ID_Category CHAR(5),
        FOREIGN KEY (ID_Category) REFERENCES  Category (ID_Category),
        name  LONGTEXT NOT NULL,
        price  DOUBLE (5,2),
        weight DOUBLE (5,2),
        photo VARCHAR(150) NOT NULL,
        Item_Address VARCHAR(80) NOT NULL
        )";

*/

if (mysqli_query($conn, $sql)) {
    echo "Table ProductItems created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
// sql code to create table
$sql = "CREATE TABLE ShoppingCart (
        ID_Cart CHAR(5) PRIMARY KEY,
        id CHAR(5),
        FOREIGN KEY (id) REFERENCES  ProductItems (id),
        Quality INT(2),
        Sub_total DOUBLE (5,2)
        )";
if (mysqli_query($conn, $sql)) {
    echo "Table ShoppingCart created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// sql code to create table Delivery
$sql = "CREATE TABLE Delivery (
        ID_Delivery CHAR(5) PRIMARY KEY,
        ID_Cart CHAR(5),
        FOREIGN KEY (ID_Cart) REFERENCES  ShoppingCart (ID_Cart),
        Receiver_name VARCHAR(30) NOT NULL,
        Shipping_address VARCHAR(80) NOT NULL,
        shipping_email VARCHAR(50) NOT NULL,
        Shipping_fee DOUBLE (5,2),
        Estimated_deli_time DATE,
        Time_delivered DATE,
        Delivery_status TINYINT(1)
        )";
if (mysqli_query($conn, $sql)) {
    echo "Table Delivery created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
// sql code to create table
$sql = "CREATE TABLE OrderInformation (
        ID_Order CHAR(5) PRIMARY KEY,
        userName CHAR(30),
        FOREIGN KEY (userName) REFERENCES  Customer (userName),
        ID_Cart CHAR(5),
        FOREIGN KEY(ID_Cart) REFERENCES  ShoppingCart (ID_Cart),
        ID_Delivery CHAR(5),
        FOREIGN KEY(ID_Delivery) REFERENCES  Delivery (ID_Delivery),
        Number_of_Items VARCHAR(30) NOT NULL,
        Total_weight VARCHAR(30) NOT NULL,
        Tax DOUBLE (5,2)  NOT NULL,
        Total_price DOUBLE (5,2)
        )";
if (mysqli_query($conn, $sql)) {
    echo "Table OrderInformation created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// INSERT DATA FOR CUSTOMER
$sql = "INSERT INTO Customer (userName, Password)
VALUES ('Chris_123', 'pass'),
('Jim Brown', 'pass1')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// INSERT DATA FOR CATEGORY
$sql = "INSERT INTO Category (ID_Category, Name, Category_Address)
VALUES ('CT001', 'Dairy', '/cat_dairy.php'),
('CT002', 'Vegetable', '/cat_vegetables.php'),
('CT003', 'Meat', '/cat_meat.php'),
('CT004', 'Fruits', '/cat_fruits.php'),
('CT005', 'Beverages', '/cat_beverages.php'),
('CT006', 'Snacks', '/cat_snacks.php')";

if (mysqli_query($conn, $sql)) {
  echo "Category is updated";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


//Insert into Snacks
/*$sql = "INSERT INTO snacks (id, ID_Category, name, price, weight, photo, Item_Address)
VALUES
('SN001', 'CT006', 'Siete Grain Free Tortilla Chips Gluten Free Sea Salt', '4.22', '0.3','Snacks/Siete-Grain-Free-Tortilla-Chips-Gluten-Free-Sea-Salt-851769007003.jpg', 'Snacks/tortilla.html '),
('SN002', 'CT006', 'SkinnyPop Popcorn Gluten Free White Cheddar Description', '2.80', '0.2','Snacks/SkinnyPop-Popcorn-Gluten-Free-White-Cheddar-850251004179.jpg', 'Snacks/popcorn.html '),
('SN003', 'CT006', 'Back To Nature Rice Thin Crackers Multi-Seed', '3.63', '0.2','Snacks/Back-To-Nature-Rice-Thin-Crackers-Multi-Seed-819898010011.jpg', 'Snacks/thincracker.html '),
('SN004', 'CT006', 'Artisan Tropic Cassava Strips Sea Salt ', '2.91', '0.2','Snacks/Artisan-Tropic-Cassava-Strips-Sea-Salt-868706000133.jpg', 'Snacks/cassava.html '),
('SN005', 'CT006', 'Kinnikinnick Gluten Free Vanilla Wafers ', '3.82', '0.3','Snacks/Kinnikinnick-Gluten-Free-Vanilla-Wafers-620133003251.jpg', 'Snacks/wafer.html '),
('SN006', 'CT006', 'Vitacost Certified Organic Microwave Popcorn Non-GMO Butter ', '2.35', '0.5','Snacks/Vitacost-Certified-Organic-Microwave-Popcorn-Non-GMO-Butter-844197025572.jpg', 'Snacks/microwavepopcorn.html '),
('SN007', 'CT006', 'Annie Homegrown Organic Classics Crackers Saltine ', '3.45', '0.50','Snacks/Kinnikinnick-Gluten-Free-Vanilla-Wafers-620133003251.jpg', 'Snacks/cracker.html '),
('SN008', 'CT006', 'Artisan Tropic Plantain Strips Gluten Free Paleo Sea Salt', '3.39', '0.6','Snacks/Artisan-Tropic-Plantain-Strips-Gluten-Free-Paleo-Sea-Salt-868706000102.jpg', 'Snacks/strips.html '),
('SN009', 'CT006', 'Mediterranean Organic Red Pepper StuVEed Green Olives ', '3.26', '0.6','Snacks/Mediterranean-Organic-Red-Pepper-Stuffed-Green-Olives-814985000227.jpg', ' Snacks/olive.html'),
('SN010', 'CT006', 'Jovial Organic Einkorn Cookies Vanilla & Chocolate ', '2.99', '1.00','Snacks/Jovial-Organic-Einkorn-Cookies-Vanilla-And-Chocolate-815421012118.jpg', ' Snacks/cookie.html')";
*/

// INSERT DATA FOR PRODUCTIONS
$sql = "INSERT INTO ProductItems (id, ID_Category, name, price, weight, photo, Item_Address)
VALUES
('DA001', 'CT001', 'Organic Whole Milk', '5.99', '8.34','Dairy/organicwholemilk.jpg', 'Dairy/wholemilk.html '),
('DA002', 'CT001', 'Organic Milk Reduced Fat 2%- 1 Gallon', '5.49', '8.34','Dairy/organicmilk2%.jpg' ,'Dairy/reducedfat.html '),
('DA003', 'CT001', 'Horizon Organic 2% Reduced Fat Milk Half Gallon ', '3.49', '4.00','Dairy/horizon2%.jpg','Dairy/horizon2.html '),
('DA004', 'CT001', 'Organic Eggs Grade A Omega 3-12counts ', '5.49', '6.00','Dairy/organicgradeA.jpg','Dairy/organicgradeA.jpg '),
('DA005', 'CT001', 'Horizon Organic Milk Vitamin D Half Gallon ', '4.69', '4.00','Dairy/1_Horizon.jpg', 'Dairy/1_Horizon.jpg '),
('DA006', 'CT001', 'Organic Milk Low Fat 1% - Gallon', '5.99', '8.43','Dairy/1_milk.jpg' ,'Dairy/lowfat.htm '),
('DA007', 'CT001', 'Organics Organic Cheese Finely Shredded Mexican Blend - 6Oz', '3.99', '0.40','Dairy/cheeseshredded.jpg','Dairy/shreddedcheese.html '),
('DA008', 'CT001', 'Organics Organic Cheese Sliced White Cheddar - 6 Oz', '3.99', '0.40','Dairy/cheeseslide.jpg' ,' Dairy/cheddarcheese.html'),
('DA009', 'CT001', 'Organics Organic Cheese Cottage 2% Milkfat Lowfat - 16 Oz', '3.99', '1.00', 'Dairy/cheeseCottage.jpg','Dairy/cottagecheese.htm '),
('DA010', 'CT001', 'Organics Organic Eggs Large Brown - 12 Count', '4.99', '6.00','Dairy/organiceggslargebrown.jpg' ,'Dairy/organiceggslargebrown.jpg '),
('VE001', 'CT002', 'Tomatoes', '3.49', '0.5', 'Vegetables/tomatoes.jpg','Vegetables/tomatoes.html '),
('VE002', 'CT002', 'Squash', '2.49', '0.5', 'Vegetables/squash.jpg','Vegetables/squash.html '),
('VE003', 'CT002', 'Radish', '2.99', '1.00','Vegetables/radish.jpg' ,'Vegetables/radish.html '),
('VE004', 'CT002', 'Red Pepper', '2.50', '0.50','Vegetables/pepper.jpg' ,'Vegetables/pepper.html '),
('VE005', 'CT002', 'Onion', '3.99', '3.00', 'Vegetables/onion.jpg','Vegetables/onion.html '),
('VE006', 'CT002', 'Cucumber', '1.50', '0.70', 'Vegetables/cucumber.jpg','Vegetables/cucumber.html '),
('VE007', 'CT002', 'Celery', '2.49', '0.50','Vegetables/celery.jpg' ,' Vegetables/celery.html'),
('VE008', 'CT002', 'Cauliflower', '3.38', '1.00', 'Vegetables/cauliflower.jpg','Vegetables/cauliflower.html '),
('VE009', 'CT002', 'Carrot', '2.49', '2.00','Vegetables/carrot.jpg', 'Vegetables/carrot.html '),
('VE010', 'CT002', 'Broccolette', '2.99', '1.00','Vegetables/broccolette.jpg', 'Vegetables/broccolette.html '),
('ME001', 'CT003', 'Premium organic New York Steak', '42.12', '15.00', 'meat/15_NewYorkStrip-large.jpg', 'meat/steak.html '),
('ME002', 'CT003', 'Organic Pork Bratwurst', '32.99', '10.00','meat/15_PorkBratwurst-large.jpg', 'meat/porkbratwurst.html '),
('ME003', 'CT003', 'Organic Boneless Skinless Chicken Breast-Package', '49.99', '10.00','meat/Chicken-Breast-Large.jpg', 'meat/chicken.html '),
('ME004', 'CT003', 'Organic ground beef', '14.00', '5.00','meat/2018_-_Ground_Beef_-_Med.jpg', 'meat/groundbeef.html '),
('ME005', 'CT003', 'Premium Organic Ribeye Steak', '57.99', '5.00','meat/15_BonelessRibeyes-large.jpg', 'meat/ribeyesteak.html '),
('ME006', 'CT003', 'Fresh to frozen organic center cut boneless pork chops ', '25.59', '5.00','meat/20_Pork_Chop_2pk_Large.jpg', 'meat/porkchop.html '),
('ME007', 'CT003', 'Organic hardwood smoked bone-in spiral cut 1/2 ham', '87.99', '5.00','meat/19_Ham_Medium.jpg', 'meat/smokedham.html '),
('ME008', 'CT003', 'Organic valley fresh to frozen organic pork bacon ', '20.29', '1.00','meat/20_FtoF_Bacon_Large1.jpg', 'meat/bacon.html '),
('ME009', 'CT003', 'Organic ground chicken', '26.99', '2.00','meat/2018_-_Ground_Chicken_-_Med.jpg', 'meat/groundchicken.html '),
('ME010','CT003', 'Whole Turkey', '98.99', '16.00','meat/2019_WholeTurkey_Med.jpg', 'meat/turkey.html '),
('FF001', 'CT004', 'Strawberries', '4.99', '1.5','Fruits/strawberries.jpg', ' Fruits/strawberries.html'),
('FF002', 'CT004', 'Bartlett Pear', '0.59', '0.5', 'Fruits/pear.jpg','Fruits/pear.html '),
('FF003', 'CT004', 'Papaya', '4.98', '1.5', 'Fruits/papaya.jpg','Fruits/papaya.html '),
('FF004', 'CT004', 'Oranges', '1.41', '0.3','Fruits/orange.jpg', 'Fruits/orange.html '),
('FF005', 'CT004', 'Kiwi', '4.99', '2.00','Fruits/kiwi.jpg', '  Fruits/kiwi.html'),
('FF006', 'CT004', 'HoneyCrisp Apples', '1.00', '0.3','Fruits/Honeycrisp Apple.jpg', 'Fruits/Honeycrisp.html '),
('FF007', 'CT004', 'Grapes', '4.51', '0.5', 'Fruits/grapes.jpg',' Fruits/grapes.html'),
('FF008', 'CT004', 'Blueberries', '3.49', '0.3','Fruits/blueberries.jpg', 'Fruits/blueberries.html '),
('FF009', 'CT004', 'Banana', '1.39', '0.5','Fruits/Banana.jpg', 'Fruits/Banana.html '),
('FF010', 'CT004', 'Avocado', '2.50', '0.5','Fruits/avocado.jpg', ' Fruits/avocado.html'),
('BE001', 'CT005', 'Cultures for Health, Water Kefir', '15', '1.00','Beverages/cultures-for-health-water-kefir-1-packet-19-oz-5-4-g.jpg', 'Beverages/water.html '),
('BE002', 'CT005', 'Dynamic Health Laboratories ,Pure Cranberry, 100% Juice Concentrate, Unsweetened', '13.10', '1.00','Beverages/dynamic-health-laboratories-pure-cranberry-100-juice-concentrate-unsweetened-16-fl-oz-473-ml.jpg', 'Beverages/cranberry.html '),
('BE003', 'CT005', 'Now Foods, Real Food, Cocoa Lovers, Organic Cocoa Powder', '6.8', '0.7','Beverages/now-foods-real-food-cocoa-lovers-organic-cocoa-powder-12-oz-340-g.jpg', ' Beverages/cocoa.html'),
('BE004', 'CT005', 'Organic Soy milk Powder', '6.8', '0.7', 'Beverages/now-foods-real-food-organic-soy-milk-powder-20-oz-567-g.jpg',' Beverages/soymilk.html'),
('BE005', 'CT005', 'Nature’s Plus, Spiru-Tein Junior, Nutritious Thick Shake Mix, Chocolate', '12', '1','Beverages/nature-s-plus-spiru-tein-junior-nutritious-thick-shake-mix-chocolate-1-lb-450-g.jpg', 'Beverages/chocolate.html '),
('BE006', 'CT005', 'Now Foods, Real Food, Slender Sticks Coconut Water, 12 Sticks', '4.10', '0.5','Beverages/now-foods-real-food-slender-sticks-coconut-water-12-sticks-4-g-each.jpg', 'Beverages/coconutwater.html '),
('BE007', 'CT005', 'Now Foods, Real Food, Buttermilk Powder, 14 oz (397 g)', '4.10', '0.8','Beverages/now-foods-real-food-buttermilk-powder-14-oz-397-g.jpg', 'Beverages/buttermilk.html '),
('BE008', 'CT005', 'Nestle Hot Cocoa Mix, Rich Milk Chocolate Flavor, 6 Packets, 0.71 oz (20.2 g) ', '1.40', '0.01','Beverages/nestle-hot-cocoa-mix-rich-milk-chocolate-flavor-6-packets-0-71-oz-20-2-g-each.jpg', ' Beverages/milkchocolate.html'),
('BE009', 'CT005', 'Dynamic Health Laboratories, Pure Pomegranate, 100% Juice Concentrate, Unsweetened, 16 fl oz (473 ml)', '9.80', '0.7','Beverages/dynamic-health-laboratories-pure-pomegranate-100-juice-concentrate-unsweetened-16-fl-oz-473-ml.jpg', ' Beverages/pomegranatejuice.html'),
('BE010','CT005', 'Gerber, Apple Prune Juice, Toddler, 12+ Months, 4 Pack, 16 fl oz (473 ml)', '4.7', '0.7','Beverages/gerber-apple-prune-juice-toddler-12-months-4-pack-16-fl-oz-473-ml.jpg', ' Beverages/applejuice.html'),
('SN001', 'CT006', 'Siete Grain Free Tortilla Chips Gluten Free Sea Salt', '4.22', '0.3','Snacks/Siete-Grain-Free-Tortilla-Chips-Gluten-Free-Sea-Salt-851769007003.jpg', 'Snacks/tortilla.html '),
('SN002', 'CT006', 'SkinnyPop Popcorn Gluten Free White Cheddar Description', '2.80', '0.2','Snacks/SkinnyPop-Popcorn-Gluten-Free-White-Cheddar-850251004179.jpg', 'Snacks/popcorn.html '),
('SN003', 'CT006', 'Back To Nature Rice Thin Crackers Multi-Seed', '3.63', '0.2','Snacks/Back-To-Nature-Rice-Thin-Crackers-Multi-Seed-819898010011.jpg', 'Snacks/thincracker.html '),
('SN004', 'CT006', 'Artisan Tropic Cassava Strips Sea Salt ', '2.91', '0.2','Snacks/Artisan-Tropic-Cassava-Strips-Sea-Salt-868706000133.jpg', 'Snacks/cassava.html '),
('SN005', 'CT006', 'Kinnikinnick Gluten Free Vanilla Wafers ', '3.82', '0.3','Snacks/Kinnikinnick-Gluten-Free-Vanilla-Wafers-620133003251.jpg', 'Snacks/wafer.html '),
('SN006', 'CT006', 'Vitacost Certified Organic Microwave Popcorn Non-GMO Butter ', '2.35', '0.5','Snacks/Vitacost-Certified-Organic-Microwave-Popcorn-Non-GMO-Butter-844197025572.jpg', 'Snacks/microwavepopcorn.html '),
('SN007', 'CT006', 'Annie Homegrown Organic Classics Crackers Saltine ', '3.45', '0.50','Snacks/Kinnikinnick-Gluten-Free-Vanilla-Wafers-620133003251.jpg', 'Snacks/cracker.html '),
('SN008', 'CT006', 'Artisan Tropic Plantain Strips Gluten Free Paleo Sea Salt', '3.39', '0.6','Snacks/Artisan-Tropic-Plantain-Strips-Gluten-Free-Paleo-Sea-Salt-868706000102.jpg', 'Snacks/strips.html '),
('SN009', 'CT006', 'Mediterranean Organic Red Pepper StuVEed Green Olives ', '3.26', '0.6','Snacks/Mediterranean-Organic-Red-Pepper-Stuffed-Green-Olives-814985000227.jpg', ' Snacks/olive.html'),
('SN010', 'CT006', 'Jovial Organic Einkorn Cookies Vanilla & Chocolate ', '2.99', '1.00','Snacks/Jovial-Organic-Einkorn-Cookies-Vanilla-And-Chocolate-815421012118.jpg', ' Snacks/cookie.html')";



if (mysqli_query($conn, $sql)) {
  echo "Productitons are updated";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// sql code to create table Dairy
$sql = "CREATE TABLE Dairy SELECT *
FROM ProductItems
WHERE ProductItems.ID_Category = 'CT001' ";
if (mysqli_query($conn, $sql)) {
    echo "Table Dairy created and updated successfully";
} else {
    echo "Error updating table: " . mysqli_error($conn);
}
// sql code to create table Vegetable
$sql = "CREATE TABLE Vegetable SELECT *
FROM ProductItems
WHERE ProductItems.ID_Category = 'CT002' ";
if (mysqli_query($conn, $sql)) {
    echo "Table Vegetable created and updated successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
// sql code to create table Meat
$sql = "CREATE TABLE Meat SELECT *
FROM ProductItems
WHERE ProductItems.ID_Category = 'CT003' ";
if (mysqli_query($conn, $sql)) {
    echo "Table Meat created and updated successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
// sql code to create table Fruits
$sql = "CREATE TABLE Fruits SELECT *
FROM ProductItems
WHERE ProductItems.ID_Category = 'CT004' ";
if (mysqli_query($conn, $sql)) {
    echo "Table Fruits created and updated successfully";
} else {
    echo "Error updating table: " . mysqli_error($conn);
}
// sql code to create table Beverages
$sql = "CREATE TABLE Beverages SELECT *
FROM ProductItems
WHERE ProductItems.ID_Category = 'CT005' ";
if (mysqli_query($conn, $sql)) {
    echo "Table Beverages created and updated successfully";
} else {
    echo "Error updating table: " . mysqli_error($conn);
}
// sql code to create table Snacks
$sql = "CREATE TABLE Snacks SELECT *
FROM ProductItems
WHERE ProductItems.ID_Category = 'CT006' ";
if (mysqli_query($conn, $sql)) {
    echo "Table Snacks created and updated successfully";
} else {
    echo "Error updating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
