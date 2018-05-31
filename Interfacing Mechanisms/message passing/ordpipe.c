#include <stdio.h>
#include <unistd.h>
#include <string.h>

int pipe1[2];
int pipe2[1];

int main() {

    pipe(pipe1);
    pipe(pipe2);

    if (fork() == 0) {
        char buffer[100];
        char *msg = "Hello from here!";

        write(pipe1[1], msg, strlen(msg) + 1);
        read(pipe2[0], buffer, 100);
        printf("Child: message from parent process is this >>: %s\n", buffer);
    }

    else {
        char buffer[100];
        char *msg = "Hello from there!";

        read(pipe1[0], buffer, 100);
        write(pipe2[1], msg, strlen(msg) + 1);        
        printf("Parent: message from child process is this >>: %s\n", buffer);
    }
    return 0;
}
