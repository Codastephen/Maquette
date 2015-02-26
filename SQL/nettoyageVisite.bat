mysql -u root --password=root --database=maquette --execute="update visite SET HeureD = NOW() WHERE HeureA < NOW() AND HeureD = '0000-00-00 00:00'";
mysql -u root --password=root --database=maquette --execute="UPDATE visiteur SET Id_current_visite = NULL, code = null";
