FROM maven:3.5-jdk-8-alpine AS builder

COPY pom.xml ./pom.xml

RUN mvn -B -f pom.xml -s /usr/share/maven/ref/settings-docker.xml dependency:resolve

RUN mvn package

FROM  openjdk:8-jre-alpine

RUN java -jar worker-jar-with-dependencies.jar