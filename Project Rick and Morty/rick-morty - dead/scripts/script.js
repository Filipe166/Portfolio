class RickMortyGeneratorAlive extends React.Component {
    //*Data
    constructor(props) {
        super(props);

        this.state = {
            characters: [],
            characters2: [],

        };
    }
    componentDidMount() {
        this.getChar();
    }

    async getChar() {
        let res = await fetch('https://rickandmortyapi.com/api/character/?page=1&name=rick&status=dead');
        let res2 = await fetch('https://rickandmortyapi.com/api/character/?page=2&name=rick&status=dead');
        const jsonRes = await res.json();
        const jsonRes2 = await res2.json();
        const characters = jsonRes.results;
        const characters2 = jsonRes2.results;
        console.log(characters);
        console.log(characters2);
        this.setState(() => ({
            characters: characters,
            characters2: characters2
        }))


    }
    // HTML
    render() {
        return (
            <div>
                <section>
                    {
                        this.state.characters.map((char) => (
                            <article>
                                <img
                                    src={char.image}
                                ></img>
                                <h2>Name: {char.name}</h2>
                                <p>Status: {char.status}</p>
                                <p>Species :{char.species}</p>
                                <p>Type :{char.type}</p>
                                <p>Gender: {char.gender}</p>
                                <p>Location: {char.location.name}</p>
                                <p>Origin: {char.origin.name}</p>
                            </article>
                        ))
                    }


                    {
                        this.state.characters2.map((char) => (
                            <article>
                                <img
                                    src={char.image}
                                ></img>
                                <h2>Name: {char.name}</h2>
                                <p>Status: {char.status}</p>
                                <p>Species :{char.species}</p>
                                <p>Type :{char.type}</p>
                                <p>Gender: {char.gender}</p>
                                <p>Location: {char.location.name}</p>
                                <p>Origin: {char.origin.name}</p>
                            </article>
                        ))
                    }
                </section>
            </div>
        );
    }
}

ReactDOM.render(<RickMortyGeneratorAlive />, document.querySelector('#app'));
