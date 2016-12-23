INSERT INTO Admin ( nome_completo, password, user_admin, email, telefone)
values ('matrix mateus', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','admin','max@hotmail.com', '30404040' ); 

INSERT INTO TipoDB (nome_db)
                     Values ( 'Standard') ,( 'Provincias'), ( 'UniversitariasTipoDB');

INSERT INTO Pacotes  (id_tipo_db, nome_pacote , preco_pacote , n_sms)
                     Values ( '1' , 'Basic' , '60000' , '100000'), ( '2' , 'Basic+' , '50000' , '100000'); 

INSERT INTO cliente (nome_cliente, username, password, email, telemovel, cliente_type, cliente_referencia) 
                           VALUES('telcosms', 'teste1','15bf532d22345576b4a51b96da4754c039ef3458494066d76828e893d69ebd1e','teste@telco.sms','0000000', 'Standard', '');

INSERT INTO Compra  (id_cliente, id_pacote , referencia_pagamento, estado_compra , data_compra)
                     Values ( '1' , '1' , 'Rdxaweer12' , 'pago' , NOW() );
INSERT INTO Compra  (id_cliente, id_pacote , referencia_pagamento, estado_compra , data_compra)
                     Values ( '1' , '2' , 'Rdxadasdasdasdweer12' , 'Nao pago' , NOW() ); 

INSERT INTO ContactosCliente (id_cliente, n_telemovel) 
                           VALUES('1' , '+420684949509'), ('1' , '+420684949509'), ('1' , '+420684949509'),('1' , '+420684344509');