import Vue from 'vue'
import { ApolloClient } from 'apollo-client'
import { HttpLink } from 'apollo-link-http'
import { InMemoryCache } from 'apollo-cache-inmemory'
import VueApollo from 'vue-apollo'
import fetch from 'unfetch'

const httpLink = new HttpLink({
    // You should use an absolute URL here
    uri: Laravel.APP_URL + '/graphql',
    fetch: fetch
})

// Create the apollo client
const apolloClient = new ApolloClient({
    link: httpLink,
    cache: new InMemoryCache(),
    connectToDevTools: true,
})

// Install the vue plugin
Vue.use(VueApollo);

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
    defaultOptions: {
        $loadingKey: 'loading'
    }
})

export default apolloProvider