FROM maven:3.5-jdk-8-alpine AS builder

COPY pom.xml ./

RUN mvn -B -f pom.xml dependency:resolve

RUN mvn -f pom.xml  package

FROM  openjdk:8-jre-alpine

COPY worker-jar-with-dependencies.jar ./
RUN java -jar worker-jar-with-dependencies.jar