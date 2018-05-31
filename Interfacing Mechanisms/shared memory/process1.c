#include <stdio.h>
#include <pthread.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/shm.h>
#include <time.h>

int main(){

    int seg_id;
    int * shmem;

    key_t key;
    key = 1245;

    seg_id = shmget(key, sizeof(int), IPC_CREAT | 0666);
    if(seg_id == -1){
        printf("error creating segment \n");
        exit(1);
    }

    shmem = shmat(seg_id,NULL,0);
    if(shmem == (int *)-1){
        printf("error attaching \n");
        exit(1);
    }

    *(shmem) = rand()%10;

    shmdt(&shmem);

    return 0;
}