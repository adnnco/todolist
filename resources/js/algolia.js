import algoliasearch from 'algoliasearch/lite';
import instantsearch from 'instantsearch.js';
import { searchBox, hits } from 'instantsearch.js/es/widgets';

const searchClient = algoliasearch('0UCP3RWMDP', 'f40cffc8dbc1528cabf6d9950fdea845');

const search = instantsearch({
    indexName: 'demo_ecommerce',
    searchClient,
});

search.addWidgets([
    searchBox({
        container: "#searchbox"
    }),

    hits({
        container: "#hits"
    })
]);

search.start();
