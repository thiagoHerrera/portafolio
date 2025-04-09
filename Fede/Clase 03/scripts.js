// // PUNTO 1

// const sumaPotencias2 = (num1, num2, num3, num4)  =>  Math.pow(num1, 2) + Math.pow(num2, 2) + Math.pow(num3, 2) + Math.pow(num4,2);
// console.log(sumaPotencias2(2,2,2,2))

// // PUNTO 2

// const datos = (...datos) =>  datos.join(" ");
// console.log(datos("hola", "mundo", "soy", "un", "programador"))

// // PUNTO 3

// const nums = (num) =>  (num >= 90 && num <= 100) ? "Verdadero" : "Falso"
// console.log(nums(20))


const pokemons=[{
    id: 1,
    name: {
      english: "Bulbasaur",
      japanese: "フシギダネ",
      chinese: "妙蛙种子",
      french: "Bulbizarre"
    },
    "type": [
      "Grass",
      "Poison"
    ],
    base: {
      HP: 45,
      Attack: 49,
      Defense: 49,
      SpAttack: 65,
      SpDefense: 65,
      Speed: 45
    }
  },
  {
    id: 2,
    name: {
      english: "Ivysaur",
      japanese: "フシギソウ",
      chinese: "妙蛙草",
      french: "Herbizarre"
    },
    type: [
      "Grass",
      "Poison"
    ],
    base: {
      HP: 60,
      Attack: 62,
      Defense: 63,
      SpAttack: 80,
      SpDefense: 80,
      Speed: 60
    }
  },
  {
    id: 3,
    name: {
      english: "Venusaur",
      japanese: "フシギバナ",
      chinese: "妙蛙花",
      french: "Florizarre"
    },
    type: [
      "Grass",
      "Poison"
    ],
    base: {
      HP: 80,
      Attack: 82,
      Defense: 83,
      SpAttack: 100,
      SpDefense: 100,
      Speed: 80
    }
  },
  {
    id: 4,
    name: {
      english: "Charmander",
      japanese: "ヒトカゲ",
      chinese: "小火龙",
      french: "Salamèche"
    },
    type: [
      "Fire"
    ],
    base: {
      HP: 39,
      Attack: 52,
      Defense: 43,
      SpAttack: 60,
      SpDefense: 50,
      Speed: 65
    }
  },
  {
    id: 5,
    name: {
      english: "Charmeleon",
      japanese: "リザード",
      chinese: "火恐龙",
      french: "Reptincel"
    },
    type: [
      "Fire"
    ],
    base: {
      HP: 58,
      Attack: 64,
      Defense: 58,
      SpAttack: 80,
      SpDefense: 65,
      Speed: 80
    }
  },
  {
    id: 6,
    name: {
      english: "Charizard",
      japanese: "リザードン",
      chinese: "喷火龙",
      french: "Dracaufeu"
    },
    type: [
      "Fire",
      "Flying"
    ],
    base: {
      HP: 78,
      Attack: 84,
      Defense: 78,
      SpAttack: 109,
      SpDefense: 85,
      Speed: 100
    }
  },
  {
    id: 7,
    name: {
      english: "Squirtle",
      japanese: "ゼニガメ",
      chinese: "杰尼龟",
      french: "Carapuce"
    },
    type: [
      "Water"
    ],
    base: {
      HP: 44,
      Attack: 48,
      Defense: 65,
      SpAttack: 50,
      SpDefense: 64,
      Speed: 43
    }
  },
  {
    id: 8,
    name: {
      english: "Wartortle",
      japanese: "カメール",
      chinese: "卡咪龟",
      french: "Carabaffe"
    },
    type: [
      "Water"
    ],
    base: {
      HP: 59,
      Attack: 63,
      Defense: 80,
      SpAttack: 65,
      SpDefense: 80,
      Speed: 58
    }
  },
  {
    id: 9,
    name: {
      english: "Blastoise",
      japanese: "カメックス",
      chinese: "水箭龟",
      french: "Tortank"
    },
    type: [
      "Water"
    ],
    base: {
      HP: 79,
      Attack: 83,
      Defense: 100,
      SpAttack: 85,
      SpDefense: 105,
      Speed: 78
    }
  },
  {
    id: 10,
    name: {
      english: "Caterpie",
      japanese: "キャタピー",
      chinese: "绿毛虫",
      french: "Chenipan"
    },
    type: [
      "Bug"
    ],
    base: {
      HP: 45,
      Attack: 30,
      Defense: 35,
      SpAttack: 20,
      SpDefense: 20,
      Speed: 45
    }
  }]

  const masvida = pokemons => pokemons.reduce((max, item) => item.base.HP > max ? item.base.HP : max, 0); 

  const bug = pokemons => pokemons.filter(item => item.type.includes("Bug")).length;
  
  const encontrar = (pokemons, nombre) => pokemons.some(item => item.name.english === nombre);
  
  const idiomaspoke = (pokemons, nombre) => pokemons.find(item => item.name.english === nombre)?.name.english || false;
  
  const masveloz = pokemons => pokemons.reduce((max, item) => item .base.Speed > max.base.Speed ? item : max, pokemons[0]).name.english;
  
  console.log(masvida(pokemons));
  console.log(bug(pokemons));
  console.log(encontrar(pokemons, "Charizard"));
  console.log(idiomaspoke(pokemons, "Charizard"));
  console.log(masveloz(pokemons));
  