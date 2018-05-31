#include <stdio.h>
#include <pthread.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/shm.h>

int main()
{

    int seg_id;
    int *shmem;

    key_t key;
    key = 1245;

    seg_id = shmget(key, sizeof(int), 0600);
    if (seg_id == -1)
    {
        printf("error creating segment");
        exit(1);
    }

    shmem = shmat(seg_id, NULL, 0);
    if (shmem == (int *)-1){
        printf("error attaching");
        exit(1);
    }

    int check = *(shmem);

    if(check%2==0){
        printf("value %d is even \n", check);
    }
    else{
        printf("value %d is odd \n", check);
    }

    shmdt(&shmem);
    shmctl(seg_id,0,NULL);

    return 0;
}