---
layout: post
title: Machine Learning Practice Task 4: LeNet-5
date: 2019-02-10 00:00:00 +0300
description: You’ll find this post in your `_posts` directory. Go ahead and edit it and re-build the site to see your changes. # Add post description (optional)
img: js-1.png # Add image post (optional)
tags: [LeNet, Keras, ML, Deep Learning] # add tag
---
# TASK 4-Part 1: Cifar 10 Training with LeNet-5

This task is for practise of LeNet.
Last task I have learned the LeNEt algorithm and used o tfor the first time. Through Task , I have gained a hands on experice by changing hyperparameters and comparing the results between them.

### Step 0: What is Cifar-10 dataset?

Since it was the forst time I have heard of cifar 10 dataset I have searched it up and collect some information about what the [cifar10](https://www.cs.toronto.edu/~kriz/cifar.html) is.

### Step 1: Understanding the LeNet-5 algorithm.

<p>Convolutional Neural Networks are are a special kind of multi-layer neural networks. Like almost every other neural networks they are trained with a version of the back-propagation algorithm. Where they differ is in the architecture.<b></p>

<p>Convolutional Neural Networks are designed to recognize visual patterns directly from pixel images with minimal preprocessing. <b></p>

<p>They can recognize patterns with extreme variability (such as handwritten characters), and with robustness to distortions and simple geometric transformations.<b></p>

<p>LeNet-5 is the latest convolutional network designed for handwritten and machine-printed character recognition.</p>  

### LeNet-5 Architecture
<p>The LeNet-5 arhitecture consists of two sets of convolutional and average pooling layers, followed by a flattening convolutional layer, two fully connected layers, and a softmax classifier:</b></p>
<p>It has 7 layers in total including output layer :</p>

* 3 convolutional layers -C1, C3 and C5-,
* 2 pooling/sub-sampling layers -S2 and S4-,
* 1 fully connected layer -F6-

![Architecture of LeNet-5](https://www.researchgate.net/profile/Vladimir_Golovko3/publication/313808170/figure/fig3/AS:552880910618630@1508828489678/Architecture-of-LeNet-5_W640.jpg)

* **First Layer**
<p>The input for LeNet-5 is a 32x32 size image which meets the first convolutional layer with 5x5 size 6-feature filters and passes one. The dimension chages 32*32*1 to 28*28*6</p>

* **Second Layer**
<p>After the image dimensions has changed, LeNet-5 applies pooling layer. Pooling Layer's function is to progressively reduce the spatial size of the representation to reduce the amount of parameters and computation in the network, and hence to also control overfitting. It operates independently on every depth slice of the input and resizes it spatially, using the MAX operation.So, the image size will be reduced to 14*14*6</p>

* **Third Layer**
<p>At this stage, there is a convolutional layer with 16-feature, 5*5 size filters; however 5*5 in the layer C3, individual convolutional kernels do not use all of the features produced by the previous layer. Only 10 out of 16 filters are connected to 6-feature filters of the previous layer.</p>

<sup>* PS There are several reasons for that. One reason is to make the network computationally less demanding.Other and the main reason is to amke convolutional kernels learn different patterns.</sup>
* **Fourth Layer**
<p>S4 is again a pooling layer with filter size 2*2 and stride of 2.This layer is the same as the second layer S2 except it has 16 features so the output will be reduced to 5*5*16 </p>

* **Fifth Layer**
<p>C5 is a convolutional layer with 120 feature filters each of size is 1*1.C5 is connected to all nodes in the fourth layer.</p>

* **Sixth Layer**
<p>This is the fully connected layer F6 with 84 units.</p>

* **Output Layer**
<p>Finally, there is a fully connected softmax output layer y with 10 possible values corresponding to the digits from 0-9. </p>

![As a summary](https://cdn-images-1.medium.com/max/800/1*gNzz6vvWmF6tDN6pTRTd9g.jpeg)
