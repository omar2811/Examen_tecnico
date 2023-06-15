
const readline = require('readline');
const mysql = require('mysql2');

const connection = mysql.createConnection({
  host: 'localhost',
  user : 'root',
  password: '',
  database : 'examen_tecnico'

});
const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

connection.connect((err) => {
  if (err) {
    console.error('Error al conectar a la base de datos: ', err);
    return;
  }
  console.log('Conexión exitosa a la base de datos.');

  rl.question('Ingrese el correo del usuario: ', (valor1) => {
    rl.question('Ingrese el password: ', (valor2) => {
      const sql = 'INSERT INTO usuarios (email, password) VALUES (?, ?)';
      const values = [valor1, valor2];
      connection.query(sql, values, (err, result) => {
        if (err) {
          console.error('Error al ejecutar la consulta: ', err);
        } else {
          console.log('Datos ingresados correctamente.');
          console.log(result);
        }

        connection.end();
        rl.close();
      });
    });
  });
});