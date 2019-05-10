//Creación de usuario para la conexión
db.createUser({
    user: 'steven',
    pwd: 'qwerty123',
    roles: ['readWrite', 'dbAdmin']
})

//Creación de colleciones "padres" e "hijas"
db.editorial.insert({
    idEditorial: 1,
    nombreEdit: 'Nube de Tinta',
    direccion: 'Barcelona España',
    pais: 'España',
    tel: 77814435
})

db.autor.insert({
    idAutor: 1,
    nombre: 'Steven',
    apellido: 'Diaz',
    pais: 'El Salvador'
})

db.categoria.insert({
    idCategoria: 1,
    nombreCat: 'Adolescentes',
    descripcion: 'Los libros más populares de adolescentes estan aqui',
    descuento: 15
})

db.libro.insert({
    idLibro: 2,
    idAutor: 1,
    idEditorial: 1,
    NombreL: 'EL Teorema de Katherine',
    Idioma: 'Español',
    NoPag: 304,
    encuadernacion: 'Tapa blanda',
    resena: 'No hay we',
    precio: 10.99,
    idCat: 1,
    img: '5cc67a4988d2d.jpg',
    cant: 5
})

//Consulta con Embedded Relationship
db.libro.aggregate([
    //Creacion de relacion, tabla origen, llaves y alias
    {
        $lookup:
        {
            from: "autor",
            localField: "idAutor",
            foreignField: "idAutor",
            as: "autor"
        }
    },
    //Para retornar como objeto, o un solo registro
    { $unwind: "$autor" },
    //Creacion de relacion, tabla origen, llaves y alias
    {
        $lookup:
        {
            from: "editorial",
            localField: "idEditorial",
            foreignField: "idEditorial",
            as: "editorial"
        }
    },
    //Para retornar como objeto, o un solo registro
    { $unwind: "$editorial" },
    //Creacion de relacion, tabla origen, llaves y alias
    {
        $lookup:
        {
            from: "categoria",
            localField: "idCat",
            foreignField: "idCategoria",
            as: "categoria"
        }
    },
    //Para retornar como objeto, o un solo registro
    { $unwind: "$categoria" },

    //Propiedad para filtrar
    { $match: { idLibro: 1 } },

    // Se define que campos quieres en tu consulta
    {
        $project: {
            idLibro: 1,
            autor: "$autor.nombre",
            editorial: "$editorial.nombreEdit",
            NombreL: 1,
            Idioma: 1,
            NoPag: 1,
            encuadernacion: 1,
            resena: 1,
            precio: 1,
            categoria: "$categoria.nombreCat",
            img: 1,
            cant: 1
        }
    }
]).pretty()

