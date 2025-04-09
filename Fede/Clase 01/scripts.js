const alumno = {
    nombre : 'Titi',
    apellido : 'Herrera',
    notas : {
        primerCuatrimeste: 10,
        segundoCuatrimestre: 10,
        materia: 'Base de Datos'
    }
}

const alumnos = [
    { 
        nombre : 'Titi',
        apellido : 'Herrera',
        notas : {
            primerCuatrimeste: 10,
            segundoCuatrimestre: 10,
            materia: 'Base de Datos'

        }
    },
    
    { 
        nombre : 'Walter',
        apellido : 'Casarino',
        notas : {
            primerCuatrimeste: 8,
            segundoCuatrimestre: 6,
            materia: 'Base de Datos'
        
        }
    },
    
    { 
        nombre : 'Manuel',
        apellido : 'Silva',
        notas : {
            primerCuatrimeste: 7,
            segundoCuatrimestre: 8,
            materia: 'Base de Datos'
    
        }
    }    

]

alumnos.forEach((alumno) => {
    console.log(`${alumno.nombre} ${alumno.apellido}`);
})


// PUNTO 1

function formulaResolvente() {
    let a = 43;
    let b = 32;
    let c = 2;
    let d = (b ** 2) - (4 * a * c);
    let x1 = (-b + Math.sqrt(d)) / (2 * a);
    let x2 = (-b - Math.sqrt(d)) / (2 * a);
    return `La solución de la ecuación es x1 = ${x1} y x2 = ${x2}`;
}

console.log(formulaResolvente());

// PUNTO 2

const pokemones = [
    {
        nombre: 'Pikachu',
        peso: 2.0,
        tipo: 'Electrico'
    },{
        nombre: 'Raichu',
        peso: 2.0,
        tipo: 'Electrico'
    },{
        nombre: 'Bulbasaur',
        peso: 10.0,
        tipo: 'Planta'
    },{
        nombre: 'Charmander',
        peso: 3.0,
        tipo: 'Fuego'
    },{
        nombre: 'Squirtle',
        peso: 9.0,
        tipo: 'Agua'
    }
]

function buscarPokemon(){
    let poke = "Charmander";
    pokemones.forEach(({nombre,peso,tipo}) => {
        if(poke.toLowerCase() === nombre.toLowerCase()){
            console.log(`El pokemon ${nombre} tiene un peso de ${peso} kg
                y es de tipo ${tipo}`);
            }
        });
}
console.log(buscarPokemon())

// PUNTO 3

function pokemonMasPesado(){
    let pesoMaximo = Math.max(...pokemones.map(pokemon => pokemon.peso));
    let pokemonMas = pokemones.find(pokemon => pokemon.peso === pesoMaximo);
    console.log(`El pokemon más pesado es ${pokemonMas.nombre} con un peso de ${pokemonMas.peso} kg`);
}
console.log(pokemonMasPesado())

// PUNTO 4

function nombreMasLargo(){
    let maximo = Math.max(...pokemones.map(pokemon => pokemon.nombre.length)); //ESTE MAP TOMA EN UN NUEVO ARRAY CON LA CANTIDAD DE CARACTERES DE LOS NOMBRES
    let pokemonMasLargo = pokemones.find(pokemon => pokemon.nombre.length === maximo);
    console.log(`El pokemon con el nombre más largo es ${pokemonMasLargo.nombre}`);
}
console.log(nombreMasLargo(nombreMasLargo.length))

// PUNTO 5

function pokemonPorTipo() {
    const tipos = ['Fuego', 'Agua', 'Planta', 'Electrico']; //HACE UN NUEVO ARRAY CON LOS TIPOS

    tipos.forEach(tipo => { //RECORRE CADA TIPO QUE ESTÉ EN EL ARRAY
        let pokemonesPorTipo = pokemones.filter(pokemon => pokemon.tipo === tipo);//HACE UN FILTRO DE LOS MISMO Y CREA UN NUEVO ARRAY EN pokemonesPorTipo
        console.log(`Los pokemones de tipo ${tipo} son:`);
        pokemonesPorTipo.forEach(({nombre}) => { //RECORRE EL FILTRO PARA POCISIONAR LOS NOMBRES
            console.log(` ${nombre}`);
        });
    });
}

console.log(pokemonPorTipo(pokemones.tipo))