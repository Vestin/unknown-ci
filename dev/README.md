develop env
---
1. install docker
2. build
```
 cd project/dev
 sudo docker build -t unknow-dev .
```
3. create container
```
sudo docker run -it --name unknow-dev-container -d -p 8080:80 -v {ProjectPath}:/var/www/html/dev unknow-dev
```

4. run container
```
sudo docker start unknow-dev-container
```

5. cd container
```
sudo docker exec -it unknow-dev-container /bin/bash
```

6. run web
```
cd project
npm run dev
```