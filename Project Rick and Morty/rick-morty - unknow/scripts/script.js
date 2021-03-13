class RickMortyGeneratorAlive extends React.Component {
    //*Data
    constructor(props) {
        super(props);

        this.state = {
            characters: [],


        };
    }
    componentDidMount() {
        this.getChar();
    }

    async getChar() {
        let res = await fetch('https://rickandmortyapi.com/api/character/?page=1&name=rick&status=unknow');
        const jsonRes = await res.json();
        const characters = jsonRes.results;
        console.log(characters);
        this.setState(() => ({
            characters: characters,

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
                </section>
            </div>
        );
    }
}

ReactDOM.render(<RickMortyGeneratorAlive />, document.querySelector('#app'));
