# awslampdemo

POC for LAMP Stack on AWS.

##Components

    +----------+     +----------+    +-----------+  +-----------+  +-----------+
    |ELB       |     |ECS       |    |Network    |  |ECS        |  |RDS        |
    |          +---->+Fargate   +--->+Load       +-->ProxySQL   +-->           |
    |          |     |ApachePHP |    |Balancer   |  |Container  |  |           |
    +----------+     +----------+    +-----------+  +-----------+  +-----------+


##Steps:
* Create docker images
* Push docker images to ECR
* Create task definition for ApachePHP and ProxySQL
* Create NLB with 3306 listener
* Create ALB with 80 listener
* Create services for ApachePHP and ProxySQL with targets for respective LB
* Create SG groups between each components based on incoming and outgoing port
* Run benchmark against /user with POST request

