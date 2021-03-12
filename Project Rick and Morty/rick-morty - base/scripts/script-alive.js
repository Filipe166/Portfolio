class RickMortyGeneratorAlive extends React.Component {
    //*Data
    constructor(props) {
        super(props);

        this.state = {
            character: [],
            name: 'Rick Sanchez',
            status: 'alive',

        };
    }
    componentDidMount() {
        this.getChar();
    }

    async getChar() {
        const res = await fetch('https://rickandmortyapi.com/api/character/?page=1&name=rick&status=alive');
        const jsonRes = await res.json();
        const character = jsonRes.results;
        console.log(character);
        this.setState(() => ({
            name: character.name,
            status: character.status,
        }))


    }
    episodeName(idParam) {
        return this.episodes.filter(ep => ep.id == idParam).name
    }
    // HTML
    render() {
        return (

            <div>
            </div>
        );
    }
}

ReactDOM.render(<RickMortyGeneratorAlive />, document.querySelector('#app-alive'));
