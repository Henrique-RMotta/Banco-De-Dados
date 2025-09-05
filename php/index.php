<?php
echo "Olá, Mundo !";
import mysql.connector

#Connect to the mysql server
conn = mysql.connector.connect (
    host="localhost",
    user="root",
    password="senaisp"
    database="atividade"
)
cursor = conn.cursor();

#Run a query 
cursor.execute("SELECT * FROM produtos");

?>


