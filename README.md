###TextTrade###
##Database Instructions##
The reason why we are using the root account of MySQL is because so far, we haven't created any database users with restricted access rights. We will fix this later. Until then, be careful because our database is not secure.
#Creating your database#
1. As soon as you downloaded XAMPP, start MySQL.
2. Open the shell for MySQL.
3. Type in the command: "mysql -u root -p" (command is "/Applications/xampp/xamppfiles/bin/mysql -u root -p" if using XAMPP on mac).
4. When the prompt requests your password, just press enter.
5. You are now in the MySQL command. Type in "create database ecomm;"
6. Done. You have created your database. Type "exit" to exit MySQL.
#Updating your database from db.sql#
1. Start XAMPP, and press the "Start" button for MySQL
2. Open the shell for MySQL and cd into the directory of your Github repository
3. Type the command: "mysql -u root -p ecomm < db.sql"
4. When the prompt requests your password, just press enter.
4. Your database is udpated. Exit MySQL.
#Pushing your changes onto db.sql#
1. Start XAMPP, and press the "Start" button for MySQL
2. Open the shell for MySQL and cd into the directory of your Github repository
3. Type the command: "mysqldump -u root -p ecomm > db.sql"
4. You have updated the shared database.
