## Obeserver Pattern

The Observer Pattern defines a one-to-many dependency between objects so that when one object changes state, all of its dependents are notified and updated automatically.

- The Observer Pattern defines a one-to-many relationship between objects.
- Subjects, or as we also know them, Observables, update Observers using a common
  interface.
- Observers are loosely coupled in that the Observable knows nothing about them,
  other than that they implement the Observer interface.
- You can push or pull data from the Observable when using the pattern (pull is
  considered more “correct”).
- Don’t depend on a specific order of notification for your Observers.
