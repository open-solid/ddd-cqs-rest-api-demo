# REST API Development with Symfony and OpenAPI

## Routing

 * Use a single route attribute for Symfony routing and OpenApi path definition
 * Conditionally enable/disable routes based on a feature flag
 * Customize `#[Path]` attribute for boilerplate code, e.g. `#[Id]` for `{id}`

## Messaging and Handling

 * Command Bus
 * Query Bus
 * Domain Event Bus

# TODO

 - [ ] Invoke ProductListener from InMemoryProductRepository on `test` mode to publish domain events
 - [ ] Improve logs with "Command/Query/Event" wording depending on the case instead of "Message"
