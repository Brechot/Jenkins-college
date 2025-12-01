pipeline {
    agent any

    stages {
        stage('Subir Laravel') {
            steps {
                dir('/home/jenkins/app') { // pasta montada com a aplicação
                    sh 'docker-compose -f app-docker-compose.yml down'
                    sh 'docker-compose -f app-docker-compose.yml up -d --build'
                }
            }
        }
    }
}
