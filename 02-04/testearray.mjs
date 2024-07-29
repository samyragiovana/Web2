const testeArray = () => {
    const obj = [
        {"name": "Samyra",  "idade": '20'},
        {"name": "Giovana",  "idade": '20'}
    ];
    
    for (let i = 0; i < obj.length; i++) {
        console.log(obj[i].name + ": " + obj[i].idade);
    }
    
    console.log(obj);
};

export default testeArray;