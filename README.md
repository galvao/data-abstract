DataAbstract
============

Disclaimer
-------------
This is absolutely a Work In Progress. It's in alpha stage and is missing a lot (see the ToDo below). 
This basically means that folders and files or even the whole design can change overnight: Nothing here is set on stone, **anything can change**.

Intro
--------

This idea first came up to me as an self-proposed exercise in Object Orientation and Abstraction: "Is it possible to make a code representation of a concept so abstract as data? If so, how??? And perhaps more importantly: what could come from that?". Later I've realized that this would be vital for two other personal projects I'm developing, since both would need this exact kind of abstraction. To keep things [DRY](http://en.wikipedia.org/wiki/Don%27t_repeat_yourself) I've finally decided to make this a separate, actual project.

The goal here is to provide an pure PHP, pure OO, abstraction for data and it's containers, recursively. Also, it's desired to acquire such a level of abstraction that makes it possible to treat data in the same way, regardless of the source.
For an example, to get a JSON file and structure it in the same way I would with a relational database entity.

Structure
---------

The structure is as follows: Data < Column < Record < Entity < Database < Server < Driver.

Although some very specific naming is used (e.g. "Database"), every concept here is generalized: A "Database", for an example, may be a disk directory. An "Entity" may be a JSON document, and so on.

Every container can contain a previous object, but this is always optional in order to make it possible to build in any direction (from data -> driver or from driver -> data). Also you can obviously stop at any step.


What this project means to be and what it doesn't
-------------

This project is meant to be:

- An exercise in Object Orientation and Abstraction;
- An abstracted layer to be used in several projects and therefore avoid writing [WETWET](http://en.wikipedia.org/wiki/Don%27t_repeat_yourself#DRY_vs_WET_solutions) code;
- A "code on display", so people can see how I think and how I code;

This project is NOT meant to be:

- A "piece of art";
- Flawless;
- A "one solution fits all";
- An ORM;
- A replacement for existing ORMs;
- A replacement for any other existing alternatives;
- Better than existing ORMs;
- Better than any other existing alternatives;
- Worse than existing ORMs;
- Worse than any other existing alternatives.

ToDo
----------
* Proper code documentation
* Finish simple concrete implementation examples
  * Data
  * Column
  * Record
  * Entity
  * Database
  * Server
  * Driver
* Testing and refactoring
  * Unit testing
  * Load testing (Performance)


Things people might say and how I'd respond
-------------

1. **Project X does EXACTLY what you're trying to do and it rocks!** Cool, nice, I'll make sure to take a look after I've finish this. As mentioned, this is also serving me as research.

2. **The idea of structuring any data as a database entity is dumb and bound to fail.**
Is it, really? Are you a 100% sure? I'm not, so I'll try and if it fails... well, it fails. =)
I'll tell you this: If it fails, I'll document the reasons why here and leave it in it's final state as research material.

3. **Why not using component X, Y or Z instead?**
First of all, the goal is not to make another ORM or even compete with any existing similar projects (see above) - it wouldn't even be possible to go that way, since the main goal here is abstraction; concrete implementations for this are absolutely secondary and may or may not appear as examples on this repo. Second, ORMs or other components usually have their own way-of-doing-it and I may either disagree with it or not being particularly interested in project X, Y or Z for n reasons/for the time being.

3. **Is it finished?**
No, far from it (see Disclaimer and ToDo above), actually. It didn't even reached my desired level of maturity yet. I'm basically only writing all of this for two reasons:
  1. So people can understand what this is meant to be and how I'm designing it.
  2. And [quack!](http://en.wikipedia.org/wiki/Rubber_duck_debugging)
4. **I think you are wrong "here", "here" or "here".**
Cool, open an issue and let's talk about it.
