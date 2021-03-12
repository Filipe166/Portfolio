class RickMortyGenerator extends React.Component {
    //*Data
    constructor(props) {
        super(props);

        this.state = {
            name: 'Rick Sanchez',
            status: 'Alive',
            species: 'Human',
            type: '',
            gender: 'Male',
            origin: {
                name: 'Earth',
                url: 'https://rickandmortyapi.com/api/location/20',
            },
            image: 'https://rickandmortyapi.com/api/character/avatar/1.jpeg',
            episodes: []

        };
    }
    componentDidMount() {
        this.getChar();
    }

    async getChar() {
        const res = await fetch('https://rickandmortyapi.com/api/character/');
        const episodesRes = await fetch('https://rickandmortyapi.com/api/episode');
        const jsonRes = await res.json();
        const jsonEpisodes = await episodesRes.json();
        const episodes = jsonEpisodes.results;
        const character = jsonRes.results[0];
        console.log(character);
        console.log(episodes);
        this.setState(() => ({
            name: character.name,
            status: character.status,
            species: character.species,
            type: character.type,
            gender: character.gender,
            origin: character.origin,
            location: character.location.name,
            episodes: character.episode,
            image: character.image
        }))
    }
    episodeName(idParam) {
        return this.episodes.filter(ep => ep.id == idParam).name
    }
    // HTML
    render() {
        return (
            <ul>
                <div>
                    <img
                        src={this.state.image}
                    ></img>
                    <h2>Name: {this.state.name}</h2>
                    <p>Status: {this.state.status}</p>
                    <p>Species :{this.state.species}</p>
                    <p>Type :{this.state.type}</p>
                    <p>Gender: {this.state.gender}</p>
                    <p>Origin: {this.state.origin.name}</p>
                    <p>Location: {this.state.location}</p>
                    <p>Episodes:
                    {this.state.episodes.map(ep => {
                        return (
                            <span>{ep.split("/")[5]}, </span>
                        )
                    })}
                    </p>
                </div>
            </ul>
        );
    }
}

ReactDOM.render(<RickMortyGenerator />, document.querySelector('#app'));
