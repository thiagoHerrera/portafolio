const numeros = [
    12, 45, 78, 23, 2, 7, 14, 67, 2, 34, 21, 87, 43, 76, 98, 1, 9, 88, 11, 54,
    27, 73, 62, 49, 31, 55, 79, 20, 93, 40, 15, 120, 58, 36, 81, 94, 66, 50, 13, 72,
    85, 47, 33, 97, 18, 70, 99, 28, 61, 80, 25, 42, 77, 53, 30, 96, 91, 46, 19, 60,
    75, 35, 1, 29, 59, 95, 22, 41, 82, 17, 48, 69, 26, 63, 71, 44, 16, 52, 92, 39,
    68, 57, 37, 74, 64, 86, 38, 24, 83, 51, 10, 2, 1, 89, 2, 14, 67, 21, 87, 43
  ];

console.log(numeros.sort((a,b) => a + b)); //lo ordena segun como pongamos las condiciones, si no ponemos nada, es el sort de los strings

console.log(numeros.reverse()); //da vuelta el array

console.log(numeros.fill('TITI')); //llena el array remplazando todo con lo que pongamos de parametro y  si ponemos ('titi,5,25') llena de titi de la posicion 5 a la 25

console.log(numeros.concat(1,2)); //agrega la cantidad de elementos al final del array

console.log(numeros.slice(10)); // elimina los primeros parametros dependiendo de cuanto pongamos. y si le ponemos (5,15) da la porcion de parametros que este en medio de esas posiciones 

console.log(numeros.join()); // devuelve todos los parametros del array juntos

console.log(numeros.lastIndexOf(45)); //devuelve el ultimo elemento que encuetra del array

console.log(numeros.includes(21)); //devuelve true o false si encuentra el paramentro

console.length(Array.isArray(numeros)); //devuelve true o false si es un array o no

const data = numeros.reduce(function (a , b) { //hace la suma de todo utilizando una sola funcion
   return a + b;
 }); 
console.log(data);

const data1 = numeros.findIndex(item => { //devuelve la ubicacion del primer parametro que encuente que siga la condicion
   if(item > 50){
      return item;
   }
}); 
console.log(data1);

 const data2 = numeros.find(item => { //devuelve el primer parametro que encuente que siga la condicion
   if(item > 50){
      return item;
   }
}); 
console.log(data2);

const data3 = numeros.filter(item => { //hace un filtro de los datos q le damos
   if(item > 50){
      return item;
   }
}); 
console.log(data3);

const data4 = numeros.map(item => { //el map hace lo mismo que forech pero te devuelve un vector, que ademas es del mismo tamaño
   return item + 'Hola';
}); 
console.log(data4);

const sinrepetir = new Set(numeros);
console.log(sinrepetir);

const body = document.getElementById('cuerpo'); //se usa para agarrar algun elemento del html
  //  textcontent se usa para modificar el elemento del html y se muestra 

sinrepetir.forEach((item) =>{
   body.innerHTML += `<div>${item}</div>`; //busca etiquetas y las utiliza
   div = document.createElement('div');
   div.textContent = item;
   div.style.width = '20px'
   div.style.height = '20px'
   div.classList.add('midiv')
   body.appendChild(div); //Agrega un nuevo nodo al final de la lista de elementos secundarios de un nodo primario
});


// PUNTO 1

function cadena(mayus){
   return mayus.toUpperCase(); //Sirve para convertir una cadena que esta en minusculas en MAYUSCULAS
}
console.log(cadena('titi capo'));

// PUNTO 2

function cletra(cadena, letra) {
  let conta = 0;
  for (let char of cadena) {
      if (char === letra) {
          conta++;
      }
  }
  return conta;
}
console.log(cletra("hola broo", "o")); 

// PUNTO 3

function decimales(numero) {
  return Number(numero.toFixed(2)); //Sirve para en este caso agarrar un numero con muchos decimales y segun la cantidad que elijamos le quitara decimales
}
console.log(decimales(3.14159)); // 3.14

// PUNTO 4

function entero(numero) {
  return Number.isInteger(numero); //Sirve para verificar si un numero es entero o no 
  }
  console.log(entero(9)); 

// PUNTO 5

function convertirBooleano(valor) {
  return valor ? "Verdadero" : "Falso";
}
console.log(convertirBooleano(true));  
console.log(convertirBooleano(false)); 

// PUNTO 6

function mayor(nuevo){ 
  return nuevo.filter(num => num > 10); 
}
  console.log(mayor(numeros));

// PUNTO 7

function multiplicado(numero){
  return numero.map(num => num * 2);
}
console.log(multiplicado(numeros))

// PUNTO 8

function suma(numero){
  return numero.map(num => num + num);
}
console.log(suma(numeros))

// PUNTO 9

function primerletraM(cadena) {
  return cadena
      .split(' ')                         
      .map(palabra => palabra.charAt(0).toUpperCase() + palabra.slice(1)) 
      .join(' ');                       
}
console.log(primerletraM("hola bro")); 

// PUNTO 10

function contarPalabras(cadena) {
  return cadena.split(' ').filter(palabra => palabra.length > 0).length;
}
console.log(contarPalabras("contador de palabras al rescate"));  

// PUNTO 11

function alreves(cadena){
  return cadena.split('').reverse().join(''); //Me lo recomendo el mismo codigo y anda jaja
}
console.log(alreves('hola mundo'));

// PUNTO 12

function remplazo(palabra){
  return palabra.replace('todo', 'este');
}
console.log(remplazo('remplazando esto jaja, todo bien bro?'))

// PUNTO 13

function palindromo(palabra) {
  return palabra === palabra.split('').reverse().join(''); //Separa, la invierta y la junta, asi verifica
}
console.log(palindromo('ana'));

// PUNTO 14

function mayor(numero){
  return Math.max(...numero); //Devuelve el valor mas grande de un array
}
console.log(mayor(numeros))