class RickMortyGenerator extends React.Component {
    //*Data
    constructor(props) {
        super(props);

        this.state = {
            characters: [],
            characters2: [],
            characters3: [],
            characters4: [],

        };
    }
    componentDidMount() {
        this.getChar();
    }

    async getChar() {
        const res = await fetch('https://rickandmortyapi.com/api/character/');
        const res2 = await fetch('https://rickandmortyapi.com/api/character/?page=2');
        const res3 = await fetch('https://rickandmortyapi.com/api/character/?page=3');
        const res4 = await fetch('https://rickandmortyapi.com/api/character/?page=4');
        const episodesRes = await fetch('https://rickandmortyapi.com/api/episode');
        const jsonRes = await res.json();
        const jsonRes2 = await res2.json();
        const jsonRes3 = await res3.json();
        const jsonRes4 = await res4.json();
        const jsonEpisodes = await episodesRes.json();
        const episodes = jsonEpisodes.results;
        const characters = jsonRes.results;
        const characters2 = jsonRes2.results;
        const characters3 = jsonRes3.results;
        const characters4 = jsonRes4.results;
        console.log(characters);
        console.log(characters2);
        console.log(characters3);
        console.log(characters4);
        this.setState(() => ({
            characters: characters,
            characters2: characters2,
            characters3: characters3,
            characters4: characters4,
        }))
    }
    episodeName(idParam) {
        return this.episodes.filter(ep => ep.id == idParam).name
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
                                <p>Species :{char.species}</p>
                                <p>Status: {char.status}</p>
                                <p>Type : {char.type}</p>
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
                                <p>Species :{char.species}</p>
                                <p>Status: {char.status}</p>
                                <p>Type :{char.type}</p>
                                <p>Gender: {char.gender}</p>
                                <p>Location: {char.location.name}</p>
                                <p>Origin: {char.origin.name}</p>

                            </article>
                        ))
                    }
                    {
                        this.state.characters3.map((char) => (
                            <article>
                                <img
                                    src={char.image}
                                ></img>
                                <h2>Name: {char.name}</h2>
                                <p>Species :{char.species}</p>
                                <p>Status: {char.status}</p>
                                <p>Type :{char.type}</p>
                                <p>Gender: {char.gender}</p>
                                <p>Location: {char.location.name}</p>
                                <p>Origin: {char.origin.name}</p>

                            </article>
                        ))
                    }
                    {
                        this.state.characters4.map((char) => (
                            <article>
                                <img
                                    src={char.image}
                                ></img>
                                <h2>Name: {char.name}</h2>
                                <p>Species :{char.species}</p>
                                <p>Status: {char.status}</p>
                                <p>Type : {char.type}</p>
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

ReactDOM.render(<RickMortyGenerator />, document.querySelector('#app'));
