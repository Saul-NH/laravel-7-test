const personas = [
    { id: 1, nombre: 'Edu', edad: 35 },
    { id: 2, nombre: 'Manuel', edad: 37 },
    { id: 3, nombre: 'Marta', edad: 42 },
    { id: 1, nombre: 'Edu', edad: 25 },
];

const busqueda = personas.map((persona, i, a) => {
    objeto = {};
    objeto['id'] = persona.id;
    objeto['cantidad'] = 0;
    return objeto;
});
console.log(busqueda);

for (let i = 0; i < personas.length; i++) {
    for (let j = 0; j < busqueda.length; j++) {
        if (busqueda[j].id == personas[i].id) {
            busqueda[j].cantidad++;
        }
    }
}
console.log(busqueda);

elChido = busqueda.filter(
    (item2, index) =>
        busqueda.findIndex((item) => item.id === item2.id) === index
);
console.log(elChido);
index = elChido.findIndex(item => item.id === 1)
console.log(elChido[index].cantidad*50);

//   const duplicados = personas.filter( (persona) => {
//           return busqueda[persona.id];
//       });

//     console.log(duplicados);

//   const busqueda = personas.reduce((acc, persona) => {

//     acc[persona.id] = ++acc[persona.id] || 0;
//     return acc;
//   }, {});
//   console.log(busqueda);
