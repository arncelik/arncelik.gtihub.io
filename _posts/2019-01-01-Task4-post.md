---
layout: post
title: "Task 4: Introduction to LeNet"
date: 2019-01-01
excerpt: "Cifar-10 Training with LeNet-5"
tags: [cifar-10, lenet, machine learning, deep learning]
feature: https://www.researchgate.net/profile/Vladimir_Golovko3/publication/313808170/figure/fig3/AS:552880910618630@1508828489678/Architecture-of-LeNet-5.png
comments: true
---
# TASK 4-Part 1: Cifar 10 Training with LeNet-5

This task is for practice of LeNet.
In the previous task I learned the working principle/logic of the LeNet algorithm and used it for the first time. I played with the hyper-parameters and compared the results between them.

### Step 0: What is Cifar-10 dataset?

Since it was the first time I have heard of cifar 10 dataset I looked it up and gathered some information about it. [cifar10](https://www.cs.toronto.edu/~kriz/cifar.html) is.

### Step 1: Understanding the LeNet-5 algorithm.

Convolutional Neural Networks are are a special kind of multi-layer neural networks. Just like almost every other neural networks they are trained with a version of the back-propagation algorithm. The only difference is the architecture.
Convolutional Neural Networks are designed to recognize visual patterns directly from pixel images with preprocessing.
They can recognize patterns such as handwritten characters, and with robustness to distortions and simple geometric transformations, and LeNet-5 is the latest convolutional network architecture designed for handwritten and machine-printed character recognition.

### LeNet-5 Architecture
The LeNet-5 arhitecture consists of two sets of convolutional and average pooling layers, followed by a flattening convolutional layer, two fully connected layers, and a softmax classifier:
It has 7 layers in total including output layer :

* 3 convolutional layers -C1, C3 and C5-,
* 2 pooling/sub-sampling layers -S2 and S4-,
* 1 fully connected layer -F6-


* **First Layer**
The input for LeNet-5 is a 32x32 size image which meets the first convolutional layer with 5x5 size 6-feature filters and passes one. The dimension chages 32*32*1 to 28*28*6

* **Second Layer**
After the image dimensions has changed, LeNet-5 applies pooling layer. Pooling Layer's function is to progressively reduce the spatial size of the representation to reduce the amount of parameters and computation in the network, and hence to also control overfitting. It operates independently on every depth slice of the input and resizes it spatially, using the MAX operation.So, the image size will be reduced to 14*14*6

* **Third Layer**
At this stage, there is a convolutional layer with 16-feature, 5*5 size filters; however 5*5 in the layer C3, individual convolutional kernels do not use all of the features produced by the previous layer. Only 10 out of 16 filters are connected to 6-feature filters of the previous layer.

* PS There are several reasons for that. One reason is to make the network computationally less demanding.Other and the main reason is to amke convolutional kernels learn different patterns.
* **Fourth Layer**
S4 is again a pooling layer with filter size 2*2 and stride of 2.This layer is the same as the second layer S2 except it has 16 features so the output will be reduced to 5*5*16

* **Fifth Layer**
C5 is a convolutional layer with 120 feature filters each of size is 1*1.C5 is connected to all nodes in the fourth layer.

* **Sixth Layer**
This is the fully connected layer F6 with 84 units.

* **Output Layer**
Finally, there is a fully connected softmax output layer y with 10 possible values corresponding to the digits from 0-9.

![As a summary](https://cdn-images-1.medium.com/max/800/1*gNzz6vvWmF6tDN6pTRTd9g.jpeg)
