mysql -u root --password=root --database=maquette --execute="DELETE FROM message WHERE datefin < NOW()";