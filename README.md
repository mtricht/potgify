# Potgify

An experimental Overwatch play of the game video (meme) generator.
Written in PHP and may contain bugs/vulnerabilities. There's still a lot that could be improved.
This was written to see if I could achieve this with avconv.

- Live Demo (offline, sorry)
- [Example output][2]

### Build & Run

```bash
git clone git@github.com:swordbeta/potgify.git
cd potgify
docker build -t potg .
docker run -d --name potg -v $(pwd):/var/www/html/ -p 9090:80 potg
```
[2]: https://swordbeta.com/out.mp4
